<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\News;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $news = Articles::orderBy('id', 'desc')->get();
        return response()->json($news, 200);
    }


    public function show($slug)
    {
        $news = Articles::where('slug', $slug)->firstOrFail();
        return response()->json($news);
    }
}
