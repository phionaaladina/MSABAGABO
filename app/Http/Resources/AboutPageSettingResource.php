<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutPageSettingResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'heroTitle' => $this->hero_title,
            'historyIntro' => $this->history_intro,
            'mandateIntro' => $this->mandate_intro,
            'mandatePromise' => $this->mandate_promise,
            'priorityAreasIntro' => $this->priority_areas_intro,
            'leadershipIntro' => $this->leadership_intro,
            'quickFacts' => $this->quick_facts ?? [],
            'pillars' => $this->pillars ?? [],
            'mandateFunctions' => $this->mandate_functions ?? [],
        ];
    }
}
