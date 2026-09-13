<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeStatResource;
use App\Models\HomeStat;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HomeStatController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return HomeStatResource::collection(
            HomeStat::orderBy('sort_order')->get()
        );
    }
}
