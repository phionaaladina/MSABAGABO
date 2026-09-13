<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutPageSettingResource;
use App\Models\AboutPageSetting;

class AboutPageSettingController extends Controller
{
    public function index(): AboutPageSettingResource
    {
        return new AboutPageSettingResource(AboutPageSetting::firstOrCreate([]));
    }
}
