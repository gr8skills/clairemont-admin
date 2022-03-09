<?php

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedIndexPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        $default = [
            'content'=>'The Lagoon School aims at investing in the Nigerian girl child for the good of the society. We have
                    both primary and secondary sections. Our school has a reputation of high moral and academic
                    standards. We have been able to achieve these through our mission: ‘partnership with the parents to
                    give an all-round education to the students, based on the dignity of the human person, integrity,
                    leadership qualities and academic excellence’ and our vision: ‘Christian Identity’.',
            'content2'=>'Partnership with parents to give an all-round education to each student, based on Christian
                            principles, with emphasis on the dignity of the human person, integrity, leadership
                            qualities and academic excellence.',
            'content3'=>'To see every Lagoon student equipped with an integral education which enables her to play her
                            unique role in the home, work place and the larger society.',
            'content4'=>'',
            'content5'=>'',
            'content6'=>'',
        ];
        $landing = Page::where('slug','LIKE','%'.'landing-page'.'%')->first();
        $landing->update($default);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
