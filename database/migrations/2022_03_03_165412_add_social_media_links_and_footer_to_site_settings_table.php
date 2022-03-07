<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSocialMediaLinksAndFooterToSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasColumn('site_settings', 'facebook_link')) {
            Schema::table('site_settings', function (Blueprint $table) {
                $table->string('portal_url')->nullable();
                $table->string('facebook_url')->nullable();
                $table->string('instagram_url')->nullable();
                $table->string('twitter_url')->nullable();
                $table->string('primary_section_phone')->nullable();
                $table->string('secondary_section_phone')->nullable();
                $table->string('school_address')->nullable();
                $table->string('school_email')->nullable();
                $table->longText('about_school')->nullable();
            });
        }
        Model::unguard();
        $default = [
            'display_name'=>'THE LAGOON SCHOOL',
            'primary_section_phone'=>'(+234) 01 3426109',
            'secondary_section_phone'=>'(+234) 704 442 7923',
            'school_address'=>'Ladipo Omotesho Cole Street, Off Adewunmi Adebimpe Drive,Lekki Phase 1, Lekki - Epe Expressway Lagos P.O Box 71166 Victoria Island Nigeria',
            'school_email'=>'info@lagoonschool.com.ng',
            'about_school'=>'The Lagoon School aims at investing in the Nigerian girl child for the good of the society. We have both primary and secondary sections. Our school has a reputation of high moral and academic standards.',
        ];
        DB::table('site_settings')->truncate();
        DB::table('site_settings')->insert($default);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('site_settings', 'facebook_link')) {
            Schema::table('site_settings', function (Blueprint $table) {
                $table->dropColumn('portal_url');
                $table->dropColumn('facebook_url');
                $table->dropColumn('instagram_url');
                $table->dropColumn('twitter_url');
                $table->dropColumn('primary_section_phone');
                $table->dropColumn('secondary_section_phone');
                $table->dropColumn('school_address');
                $table->dropColumn('school_email');
                $table->longText('about_school')->nullable();
            });
        }
    }
}
