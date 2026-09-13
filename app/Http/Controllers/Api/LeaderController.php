<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LeaderResource;
use App\Models\Leader;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LeaderController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return LeaderResource::collection(
            Leader::orderBy('sort_order')->get()
        );
    }
}
