<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomePageSettingResource;
use App\Models\HomePageSetting;

class HomePageSettingController extends Controller
{
    public function index(): HomePageSettingResource
    {
        return new HomePageSettingResource(HomePageSetting::firstOrCreate([]));
    }
}
