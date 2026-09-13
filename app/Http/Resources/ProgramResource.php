<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'acronym' => $this->acronym,
            'name' => $this->name,
            'tagline' => $this->tagline,
            'fact' => $this->fact,
            'description' => $this->description,
            'image' => Media::url($this->image),
            'theme' => $this->theme,
        ];
    }
}
