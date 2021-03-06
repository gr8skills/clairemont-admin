<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getContent($slug)
    {
        return Page::where('slug', $slug)->first() ?? null;
    }

    protected function getResponse($content, $code = 200)
    {
        return response()->json($content, $code);
    }
}
