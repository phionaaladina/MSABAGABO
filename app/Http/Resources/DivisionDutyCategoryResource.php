<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DivisionDutyCategoryResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'icon' => $this->icon,
            'duties' => $this->duties->map(fn ($duty) => [
                'title' => $duty->title,
                'description' => $duty->description,
            ]),
        ];
    }
}
