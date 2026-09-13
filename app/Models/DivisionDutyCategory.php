<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DivisionDutyCategory extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'sort_order',
    ];

    public function duties(): HasMany
    {
        return $this->hasMany(DivisionDuty::class)->orderBy('sort_order');
    }
}
