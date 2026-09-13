<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPageSetting extends Model
{
    protected $fillable = [
        'hero_title',
        'history_intro',
        'mandate_intro',
        'mandate_promise',
        'priority_areas_intro',
        'leadership_intro',
        'quick_facts',
        'pillars',
        'mandate_functions',
    ];

    protected $casts = [
        'quick_facts' => 'array',
        'pillars' => 'array',
        'mandate_functions' => 'array',
    ];
}
