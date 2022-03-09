<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugColumnToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('articles', 'slug')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->string('slug')->after('title');
            });

            \App\Models\Articles::all()->each(function ($news) {
                $news->slug = \Illuminate\Support\Str::of($news->title)->slug('-');
                $news->save();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
}
