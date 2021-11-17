<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return response()->json($news, 200);
    }


    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return response()->json($news);
    }
}
