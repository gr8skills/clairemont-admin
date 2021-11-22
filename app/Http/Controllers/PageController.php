<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // About Pages
    public function about()
    {
        $pages = Page::where('page_category_id', 1)->with('category')->get();

        return view('pages.about')->with([
            'pages' => $pages
        ]);
    }

    // Academics
    public function academics()
    {
        $pages = Page::where('page_category_id', 2)->with('category')->get();

        return view('pages.academics')->with([
            'pages' => $pages
        ]);
    }

    // Admission
    public function admission()
    {
        $pages = Page::where('page_category_id', 3)->with('category')->get();

        return view('pages.admission')->with([
            'pages' => $pages
        ]);
    }

    // Student Life
    public function studentLife()
    {
        $pages = Page::where('page_category_id', 5)->with('category')->get();

        return view('pages.student-life')->with([
            'pages' => $pages
        ]);
    }

    // Giving
    public function giving()
    {
        $pages = Page::where('page_category_id', 6)->with('category')->get();

        return view('pages.giving')->with([
            'pages' => $pages
        ]);
    }

    // Parents
    public function parents()
    {
        $pages = Page::where('page_category_id', 7)->with('category')->get();

        return view('pages.parents')->with([
            'pages' => $pages
        ]);
    }


    public function editPage($slug) {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('pages.edit-page')->with([
            'page' => $page
        ]);
    }

    public function updatePage(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $data = $request->only(['content', 'banner', 'footerImage', 'title']);

        if ($request->banner) {
            $data['banner'] = $request->banner->store('', 'public');
        }

        if ($request->footerImage) {
            $data['footer_image'] = $request->footerImage->store('', 'images');
        }

        if (!$data['title']) {
            unset($data['title']);
        }

        unset($request);

        $page->fill($data);
        $page->save();
        $redirectPath = str_replace(' ', '-', $page->category->name);
        return redirect('/pages/' . $redirectPath);
    }

    public function deletePage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $page->delete();

        $redirectPath = str_replace(' ', '-', $page->category->name);
        return redirect('/pages/' . $redirectPath);
    }
}
