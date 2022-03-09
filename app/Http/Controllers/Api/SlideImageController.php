<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\SlideImage;
use App\Models\Sponsor;

class SlideImageController extends Controller
{
    public function index()
    {
        $slideImages = SlideImage::all();
        return $this->getResponse($slideImages);
    }
}
