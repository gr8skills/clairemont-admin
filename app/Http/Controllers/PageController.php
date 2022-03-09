<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\SlideImage;
use Illuminate\Http\Request;

class PageController extends Controller
{


    //index pages
    public function index()
    {
        $page = Page::where('slug','LIKE','%'.'landing-page'.'%')->first();
        $pages = Page::where('page_category_id', $page->page_category_id)->with('category')->get();
        $slideImages = SlideImage::all();
        return view('pages.index')->with([
            'pages' => $pages,
            'slideImages' => $slideImages
        ]);
    }

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
        $data = $request->only(['content', 'banner', 'footerImage', 'title', 'link','content2','content3','content4','content5','content6','content7','content8','content9','content10','title1','title2','title3','img1','img2','img3','img4','img5']);

        if ($request->banner) {
            //delete previous banner
            $prevBanner = $page->banner;
            $path = public_path().'/images/'.$prevBanner;
            if (file_exists($path)){
                unlink($path);
            }

            $data['banner'] = $request->banner->store('', 'images');
        }

        if ($request->footerImage) {
            //delete previous banner
            $prevImage = $page->footer_image;
            if (!is_null($prevImage)){
                $path = public_path().'/images/'.$prevImage;
                if (file_exists($path)){
                    unlink($path);
                }
            }


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

    public function indexPage(){

    }
}
