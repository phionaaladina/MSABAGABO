<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriorityArea extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'sort_order',
    ];
}
