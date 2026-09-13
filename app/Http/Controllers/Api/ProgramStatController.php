<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProgramStatResource;
use App\Models\ProgramStat;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProgramStatController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProgramStatResource::collection(
            ProgramStat::orderBy('sort_order')->get()
        );
    }
}
