<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HeroSlideResource;
use App\Models\HeroSlide;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HeroSlideController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return HeroSlideResource::collection(
            HeroSlide::where('is_active', true)
                ->orderBy('sort_order')
                ->get()
        );
    }
}
