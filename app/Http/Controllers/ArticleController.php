<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $news = Articles::orderBy('id', 'desc')->get();
        return view('articles.index')->with([
            'news' => $news
        ]);
    }

    public function create()
    {
        return view('articles.add-articles');
    }

    public function edit($slug)
    {
        $news = Articles::where('slug', $slug)->firstOrFail();
        return view('articles.edit-articles')->with(['news' => $news]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'content' => ['required']
        ]);

        $data = $request->all();
        $data['slug'] = Str::of($request->get('title'))->slug('-');
        if ($request->hasFile('thumb')) {
            $data['thumb'] = $request->file('thumb')->store('', 'images');
        }

        Articles::create($data);
        return redirect()->route('articles');
    }

    public function update(Request $request, $slug)
    {
        $news = Articles::where('slug', $slug)->firstOrFail();
        foreach ($request->all() as $key => $param) {
            if (!!$param && $key !== '_token') {
                $news->{$key} = $param;
            }
        }
        $news->save();
        return redirect()->route('articles');
    }

    public function destroy($slug)
    {
        $news = Articles::where('slug', $slug)->firstOrFail();
        $news->delete();
        return redirect()->route('articles');
    }
}
