<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'image',
        'caption',
        'location',
        'status',
        'sort_order',
    ];
}
