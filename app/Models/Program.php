<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'acronym',
        'name',
        'tagline',
        'fact',
        'description',
        'image',
        'theme',
        'sort_order',
    ];
}
