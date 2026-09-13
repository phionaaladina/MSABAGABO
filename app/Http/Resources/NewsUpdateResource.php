<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsUpdateResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'date' => $this->published_date->format('F j, Y'),
            'body' => $this->body,
            'href' => $this->external_url,
            'image' => Media::url($this->image),
        ];
    }
}
