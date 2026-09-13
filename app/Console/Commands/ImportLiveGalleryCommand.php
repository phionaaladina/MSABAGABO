<?php

namespace App\Console\Commands;

use App\Models\GalleryImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ImportLiveGalleryCommand extends Command
{
    protected $signature = 'gallery:import-live
        {--url=https://msabagabo.go.ug/gallery/ : Live gallery page to import}
        {--replace : Remove previously imported live gallery records before importing}';

    protected $description = 'Import gallery images from the live municipal website into local storage and the CMS database';

    public function handle(): int
    {
        $pageUrl = (string) $this->option('url');

        try {
            $html = Http::withHeaders(['Accept' => 'text/html'])
                ->timeout(120)
                ->get($pageUrl)
                ->throw()
                ->body();
        } catch (Throwable $exception) {
            $this->error("Unable to fetch {$pageUrl}: {$exception->getMessage()}");

            return self::FAILURE;
        }

        preg_match_all(
            '/<img\b[^>]*data-image=["\']([^"\']+)["\'][^>]*data-title=["\']([^"\']*)["\'][^>]*>/i',
            $html,
            $matches,
            PREG_SET_ORDER
        );

        if ($matches === []) {
            $this->error('No gallery images were found on the live page.');

            return self::FAILURE;
        }

        if ($this->option('replace')) {
            GalleryImage::query()->delete();
        }

        $imported = 0;

        foreach ($matches as $index => $match) {
            $imageUrl = html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5);
            $title = trim(html_entity_decode($match[2], ENT_QUOTES | ENT_HTML5));
            $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH) ?: '', PATHINFO_EXTENSION) ?: 'jpg';
            $path = 'gallery/live-'.str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT).'.'.$extension;

            try {
                $image = Http::timeout(120)->get($imageUrl)->throw();
                Storage::disk('public')->put($path, $image->body());
            } catch (Throwable $exception) {
                $this->warn("Skipped {$imageUrl}: {$exception->getMessage()}");

                continue;
            }

            GalleryImage::updateOrCreate(
                ['image' => $path],
                [
                    'category' => 'governance',
                    'title' => $title !== '' ? $title : 'Municipal Council Gallery',
                    'caption' => 'Photo from the Makindye Ssabagabo Municipal Council gallery.',
                    'sort_order' => 100 + $index,
                ]
            );

            $imported++;
        }

        $this->info("Imported {$imported} live gallery image(s) into the CMS.");

        return $imported > 0 ? self::SUCCESS : self::FAILURE;
    }
}
