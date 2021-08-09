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

    public function aboutHome()
    {

    }

    public function aboutMeetHead()
    {

    }

    public function aboutEducationalPhilosophy()
    {

    }

    public function aboutVirtualTour()
    {

    }

    public function aboutPartnershipParents()
    {

    }

    public function aboutContact()
    {

    }

    // Academics
    public function academics()
    {
        return view('pages.academics');
    }

    public function academicsFacilities()
    {

    }

    public function academicsJuniorSchool()
    {

    }

    public function academicsSeniorSchool()
    {

    }

    public function academicsLibrary()
    {

    }

    public function academicsCalendar()
    {

    }

    // Admission
    public function admission()
    {
        return view('pages.admission');
    }

    public function admissionProcedure()
    {

    }

    public function admissionTuition()
    {

    }

    public function admissionScholarship()
    {

    }

    public function admissionFAQ()
    {

    }

    public function admissionApply()
    {

    }

    // Student Life
    public function studentLife()
    {
        return view('pages.student-life');
    }

    public function studentLifeIndex()
    {

    }

    public function studentLifeTraditions()
    {

    }

    public function studentLifeLeadership()
    {

    }

    public function studentLifeService()
    {

    }

    public function studentLifeClubActivities()
    {

    }

    public function studentLifeMentoring()
    {

    }

    // Giving
    public function giving()
    {
        return view('pages.giving');
    }

    public function givingWhyGive()
    {

    }

    public function givingFAQ()
    {

    }

    public function givingHowTo()
    {

    }

    // Parents
    public function parents()
    {
        return view('pages.parents');
    }

    public function parentsNafad()
    {

    }

    public function parentsDigitalSafety()
    {

    }

    public function parentsLunchMenu()
    {

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
        $data = $request->only(['content', 'banner', 'footerImage']);

        if ($request->banner) {
            $data['banner'] = $request->banner->store('', 'public');
        }

        if ($request->footerImage) {
            $data['footer_image'] = $request->footerImage->store('', 'public');
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
