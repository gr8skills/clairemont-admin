<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_category_id')->constrained();
            $table->string('title');
            $table->longText('content')->nullable();
            $table->string('banner')->nullable();
            $table->string('footer_image')->nullable();
            $table->timestamps();
        });

        $pageCategories = \App\Models\PageCategory::all()->pluck('id')->toArray();
        foreach ($pageCategories as $cat) {
            switch ($cat) {
                case 1:
                    $pageTitles = [
                        'about the lagoon school',
                        'meet the head',
                        'educational philosophy & model',
                        'news and updates',
                        'virtual tour',
                        'partnership with parents',
                        'contact us',
                    ];
                    foreach ($pageTitles as $title) {
                        \App\Models\Page::create([
                            'page_category_id' => 1,
                            'title' => $title
                        ]);
                    }
                    break;
                case 2:
                    $pageTitles = [
                        'academic facilities',
                        'junior school',
                        'senior school',
                        'library',
                        'academic calendar'
                    ];
                    foreach ($pageTitles as $title) {
                        \App\Models\Page::create([
                            'page_category_id' => 2,
                            'title' => $title
                        ]);
                    }
                    break;
                case 3:
                    $pageTitles = [
                        'admission procedure',
                        'school tuition fee',
                        'scholarship',
                        'faqs',
                        'apply to lagoon school'
                    ];
                    foreach ($pageTitles as $title) {
                        \App\Models\Page::create([
                            'page_category_id' => 3,
                            'title' => $title
                        ]);
                    }
                    break;
                case 4:
                    break;
                case 5:
                    $pageTitles = [
                        'life in lagoon',
                        'lagoon traditions',
                        'student leadership',
                        'service',
                        'club and activities',
                        'mentoring/tutorials'
                    ];
                    foreach ($pageTitles as $title) {
                        \App\Models\Page::create([
                            'page_category_id' => 5,
                            'title' => $title
                        ]);
                    }
                    break;
                case 6:
                    $pageTitles = [
                        'why give',
                        'giving faqs',
                        'how to give'
                    ];
                    foreach ($pageTitles as $title) {
                        \App\Models\Page::create([
                            'page_category_id' => 6,
                            'title' => $title
                        ]);
                    }
                    break;
                case 7:
                    $pageTitles = [
                        'nafad',
                        'digital safety',
                        'lunch menu'
                    ];
                    foreach ($pageTitles as $title) {
                        \App\Models\Page::create([
                            'page_category_id' => 7,
                            'title' => $title
                        ]);
                    }
                    break;
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
