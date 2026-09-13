<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsUpdateResource;
use App\Models\NewsUpdate;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NewsUpdateController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return NewsUpdateResource::collection(
            NewsUpdate::where('is_published', true)
                ->orderByDesc('published_date')
                ->get()
        );
    }

    public function show(string $slug): NewsUpdateResource
    {
        return new NewsUpdateResource(
            NewsUpdate::where('is_published', true)
                ->where('slug', $slug)
                ->firstOrFail()
        );
    }
}
