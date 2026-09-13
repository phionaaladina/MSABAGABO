<?php

namespace App\Console\Commands;

use App\Models\Program;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ImportLiveProgramsCommand extends Command
{
    protected $signature = 'programs:import-live
        {--url=https://msabagabo.go.ug/wp-json/wp/v2 : WordPress API base URL}';

    protected $description = 'Import original program featured images from the live municipal website';

    public function handle(): int
    {
        $baseUrl = rtrim((string) $this->option('url'), '/');
        $programs = [
            'GKMA-UDP' => 'gkma-udp',
            'Projects' => 'projects',
            'WEP' => 'wep',
            'YLP' => 'ylp',
            'PDM' => 'pdm',
            'UPE' => 'upe',
            'USE' => 'use',
            'SAGE' => 'sage',
            'GRM' => 'grm',
            'MDF' => 'mdf',
        ];

        $imported = 0;

        foreach ($programs as $acronym => $slug) {
            try {
                $page = Http::timeout(120)
                    ->get("{$baseUrl}/pages", ['slug' => $slug, 'per_page' => 1])
                    ->throw()
                    ->json()[0] ?? null;

                $mediaId = (int) ($page['featured_media'] ?? 0);
                $imageUrl = '';
                if ($mediaId > 0) {
                    $media = Http::timeout(120)
                        ->get("{$baseUrl}/media/{$mediaId}")
                        ->throw()
                        ->json();
                    $imageUrl = (string) ($media['source_url'] ?? '');
                }

                if ($imageUrl === '') {
                    preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', (string) ($page['content']['rendered'] ?? ''), $imageMatch);
                    $imageUrl = html_entity_decode($imageMatch[1] ?? '', ENT_QUOTES | ENT_HTML5);
                }

                if ($imageUrl === '') {
                    $this->warn("{$acronym}: no original image was available on the live page.");
                    $this->updateDescription($acronym, $page['content']['rendered'] ?? '');

                    continue;
                }

                $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH) ?: '', PATHINFO_EXTENSION) ?: 'jpg';
                $path = 'programs/live-'.strtolower(str_replace('-', '', $acronym)).'.'.$extension;
                $image = Http::timeout(120)->get($imageUrl)->throw();
                Storage::disk('public')->put($path, $image->body());

                $program = Program::where('acronym', $acronym)->first();
                if ($program !== null) {
                    $updates = ['image' => $path];
                    $liveDescription = $this->extractDescription($page['content']['rendered'] ?? '');
                    if ($liveDescription !== '' && mb_strlen($liveDescription) > mb_strlen((string) $program->description)) {
                        $updates['description'] = $liveDescription;
                    }
                    $program->update($updates);
                }
                $imported++;
                $this->line("{$acronym}: imported {$path}");
            } catch (Throwable $exception) {
                $this->warn("{$acronym}: {$exception->getMessage()}");
            }
        }

        $this->info("Imported {$imported} original program image(s).");

        return $imported > 0 ? self::SUCCESS : self::FAILURE;
    }

    private function extractDescription(string $html): string
    {
        preg_match_all('/<(?:p|h[1-6]|li)[^>]*>(.*?)<\/(?:p|h[1-6]|li)>/is', $html, $blocks);

        $paragraphs = [];
        foreach ($blocks[1] ?? [] as $block) {
            $text = html_entity_decode(strip_tags($block), ENT_QUOTES | ENT_HTML5);
            $text = trim((string) preg_replace('/\s+/', ' ', $text));
            if ($text !== '' && ! str_contains(strtolower($text), 'visit our site e-library')) {
                $paragraphs[] = $text;
            }
        }

        return implode("\n\n", array_values(array_unique($paragraphs)));
    }

    private function updateDescription(string $acronym, string $html): void
    {
        $program = Program::where('acronym', $acronym)->first();
        $liveDescription = $this->extractDescription($html);

        if ($program !== null && $liveDescription !== '' && mb_strlen($liveDescription) > mb_strlen((string) $program->description)) {
            $program->update(['description' => $liveDescription]);
        }
    }
}
