<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PriorityAreaResource;
use App\Models\PriorityArea;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PriorityAreaController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PriorityAreaResource::collection(
            PriorityArea::orderBy('sort_order')->get()
        );
    }
}
