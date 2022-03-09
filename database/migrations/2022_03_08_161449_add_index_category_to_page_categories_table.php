<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexCategoryToPageCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categoryTexts = ['index'];

        foreach ($categoryTexts as $text) {
            $cat = \App\Models\PageCategory::create([
                'name' => $text
            ]);
            $pageTitles = [
                'landing page',
            ];
            foreach ($pageTitles as $title) {
                \App\Models\Page::create([
                    'page_category_id' => $cat->id,
                    'title' => $title,
                    'slug' => \Illuminate\Support\Str::of($title)->slug('-'),
                ]);
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
        $categoryTexts = ['index','others'];

        foreach ($categoryTexts as $text) {
            $cat = \App\Models\PageCategory::where([
                'name' => $text
            ]);
            if (isset($cat)){
                $cat->delete();
            }
        }
    }
}
