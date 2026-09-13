<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuickLinkResource;
use App\Models\QuickLink;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuickLinkController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return QuickLinkResource::collection(
            QuickLink::orderBy('sort_order')->get()
        );
    }
}
