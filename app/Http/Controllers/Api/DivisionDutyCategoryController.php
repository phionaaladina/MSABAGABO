<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DivisionDutyCategoryResource;
use App\Models\DivisionDutyCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DivisionDutyCategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return DivisionDutyCategoryResource::collection(
            DivisionDutyCategory::with('duties')->orderBy('sort_order')->get()
        );
    }
}
