<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class LandingPagesController extends Controller
{
    public function home()
    {
        return $this->getResponse($this->getContent('landing-page'));
    }

}
