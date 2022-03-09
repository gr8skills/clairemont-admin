<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchoolHeadToSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasColumn('site_settings', 'school_head')) {
            Schema::table('site_settings', function (Blueprint $table) {
                $table->string('school_head')->nullable();
            });
        }
        Model::unguard();
        $default = [
            'school_head'=>'Mrs Isebor Margaret',
        ];
        $settings = \App\Models\SiteSetting::orderBy('id', 'asc')->first();
        $settings->school_head = $default['school_head'];
        $settings->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('site_settings', 'school_head')) {
            Schema::table('site_settings', function (Blueprint $table) {
                $table->dropColumn('school_head');
            });
        }
    }
}
