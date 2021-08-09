<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
Route::get('/unauthorized', [App\Http\Controllers\HomeController::class, 'unauthorizedView'])->name('unauthorized');

Route::middleware(['auth', 'admin'])->group(function () {
   Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

   Route::prefix('pages')->group(function () {
       Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name('about');
       Route::get('/about/home', [\App\Http\Controllers\PageController::class, 'aboutHome'])->name('about-home');
       Route::get('/about/meet-head', [\App\Http\Controllers\PageController::class, 'aboutMeetHead'])->name('about-meet-head');
       Route::get('/about/educational-philosophy', [\App\Http\Controllers\PageController::class, 'aboutEducationalPhilosophy'])->name('about-educational-philosophy');
       Route::get('/about/virtual-tour', [\App\Http\Controllers\PageController::class, 'aboutVirtualTour'])->name('about-virtual-tour');
       Route::get('/about/partnership-parents', [\App\Http\Controllers\PageController::class, 'aboutPartnershipParents'])->name('about-partnership-parents');
       Route::get('/about/contact-us', [\App\Http\Controllers\PageController::class, 'aboutContact'])->name('about-contact-us');

       Route::get('/academics', [\App\Http\Controllers\PageController::class, 'academics'])->name('academics');
       Route::get('/academics/facilities', [\App\Http\Controllers\PageController::class, 'academicsFacilities'])->name('academics-facilities');
       Route::get('/academics/junior-school', [\App\Http\Controllers\PageController::class, 'academicsJuniorSchool'])->name('academics-junior-school');
       Route::get('/academics/senior-school', [\App\Http\Controllers\PageController::class, 'academicsSeniorSchool'])->name('academics-senior-school');
       Route::get('/academics/library', [\App\Http\Controllers\PageController::class, 'academicsLibrary'])->name('academics-library');
       Route::get('/academics/calender', [\App\Http\Controllers\PageController::class, 'academicsCalendar'])->name('academics-calendar');

       Route::get('/admission', [\App\Http\Controllers\PageController::class, 'admission'])->name('admission');
       Route::get('/admission/procedure', [\App\Http\Controllers\PageController::class, 'admissionProcedure'])->name('admission-procedure');
       Route::get('/admission/tuition', [\App\Http\Controllers\PageController::class, 'admissionTuition'])->name('admission-tuition');
       Route::get('/admission/scholarship', [\App\Http\Controllers\PageController::class, 'admissionScholarship'])->name('admission-scholarship');
       Route::get('/admission/faqs', [\App\Http\Controllers\PageController::class, 'admissionFAQ'])->name('admission-faqs');
       Route::get('/admission/apply', [\App\Http\Controllers\PageController::class, 'admissionApply'])->name('admission-apply');


       Route::get('/student-life', [\App\Http\Controllers\PageController::class, 'studentLife'])->name('student-life');
       Route::get('/student-life/index', [\App\Http\Controllers\PageController::class, 'studentLifeIndex'])->name('student-life-index');
       Route::get('/student-life/traditions', [\App\Http\Controllers\PageController::class, 'studentLifeTraditions'])->name('student-life-traditions');
       Route::get('/student-life/leadership', [\App\Http\Controllers\PageController::class, 'studentLifeLeadership'])->name('student-life-leadership');
       Route::get('/student-life/service', [\App\Http\Controllers\PageController::class, 'studentLifeService'])->name('student-life-service');
       Route::get('/student-life/club-activities', [\App\Http\Controllers\PageController::class, 'studentLifeClubActivities'])->name('student-life-club-activities');
       Route::get('/student-life/mentoring', [\App\Http\Controllers\PageController::class, 'studentLifeMentoring'])->name('student-life-mentoring');

       Route::get('/giving', [\App\Http\Controllers\PageController::class, 'giving'])->name('giving');
       Route::get('/giving/why-give', [\App\Http\Controllers\PageController::class, 'givingWhyGive'])->name('giving-why-give');
       Route::get('/giving/faq', [\App\Http\Controllers\PageController::class, 'givingFAQ'])->name('giving-faq');
       Route::get('/giving/how-to', [\App\Http\Controllers\PageController::class, 'givingHowTo'])->name('giving-how-to');

       Route::get('/parents', [\App\Http\Controllers\PageController::class, 'parents'])->name('parents');
       Route::get('/parents/nafad', [\App\Http\Controllers\PageController::class, 'parentsNafad'])->name('parents-nafad');
       Route::get('/parents/digital-safety', [\App\Http\Controllers\PageController::class, 'parentsDigitalSafety'])->name('parents-digital-safety');
       Route::get('/parents/lunch-menu', [\App\Http\Controllers\PageController::class, 'parentsLunchMenu'])->name('parents-lunch-menu');

       Route::get('/edit/{slug}', [\App\Http\Controllers\PageController::class, 'editPage'])->name('page-edit');
       Route::post('/edit/{slug}', [\App\Http\Controllers\PageController::class, 'updatePage']);
       Route::delete('/delete/{slug}', [\App\Http\Controllers\PageController::class, 'deletePage'])->name('page-delete');
   });
   Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');
   Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('article');
   Route::get('/site-setting', [\App\Http\Controllers\SiteSettingController::class, 'index'])->name('site-setting');
});
