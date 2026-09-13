<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DivisionDuty extends Model
{
    protected $fillable = [
        'division_duty_category_id',
        'title',
        'description',
        'sort_order',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(DivisionDutyCategory::class, 'division_duty_category_id');
    }
}
