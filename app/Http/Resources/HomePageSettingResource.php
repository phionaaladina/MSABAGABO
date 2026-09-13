<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomePageSettingResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'aboutTeaserHeading' => $this->about_teaser_heading,
            'aboutTeaserText' => $this->about_teaser_text,
            'aboutTeaserImage' => Media::url($this->about_teaser_image),
            'aboutTeaserLinkUrl' => $this->about_teaser_link_url,
            'ctaHeading' => $this->cta_heading,
            'ctaText' => $this->cta_text,
            'viewAllNewsUrl' => $this->view_all_news_url,
        ];
    }
}
