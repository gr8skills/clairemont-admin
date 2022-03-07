<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkToPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('pages', 'link')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->string('link')->nullable();
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
        if (Schema::hasColumn('pages', 'link')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn('link');
            });
        }
    }
}
