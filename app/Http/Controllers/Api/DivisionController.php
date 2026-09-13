<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DivisionResource;
use App\Models\Division;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DivisionController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return DivisionResource::collection(
            Division::orderBy('sort_order')->get()
        );
    }

    public function show(string $slug): DivisionResource
    {
        return new DivisionResource(
            Division::where('slug', $slug)->firstOrFail()
        );
    }
}
