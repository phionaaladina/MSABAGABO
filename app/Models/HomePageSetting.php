<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    protected $fillable = [
        'about_teaser_heading',
        'about_teaser_text',
        'about_teaser_image',
        'about_teaser_link_url',
        'cta_heading',
        'cta_text',
        'view_all_news_url',
    ];
}
