<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteSettingResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'address' => $this->address,
            'phones' => $this->phones ?? [],
            'emails' => $this->emails ?? [],
            'socials' => $this->socials ?? [],
            'mapEmbedUrl' => $this->map_embed_url,
            'directionsUrl' => $this->directions_url,
            'whatsappNumber' => $this->whatsapp_number,
        ];
    }
}
