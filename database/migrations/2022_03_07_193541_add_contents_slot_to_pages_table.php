<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddContentsSlotToPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasColumn('pages', 'content2')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->longText('content2')->nullable();
                $table->longText('content3')->nullable();
                $table->longText('content4')->nullable();
                $table->longText('content5')->nullable();
                $table->longText('content6')->nullable();
                $table->longText('content7')->nullable();
                $table->longText('content8')->nullable();
                $table->longText('content9')->nullable();
                $table->longText('content10')->nullable();
                $table->string('img1')->nullable();
                $table->string('img2')->nullable();
                $table->string('img3')->nullable();
                $table->string('img4')->nullable();
                $table->string('img5')->nullable();
                $table->string('title1')->nullable();
                $table->string('title2')->nullable();
                $table->string('title3')->nullable();
            });

            Model::unguard();
            $default = [
                'content2'=>'The Lagoon School started as a secondary school open only to girls on 15th September, 1995 with only fifty students. It was situated at number 75 Adisa Bashua Street in Surulere, Lagos. We moved to our permanent site in Lekki in April, 2001, with four hundred and nineteen students. Right now, The Lagoon School has a population of One thousand and thirty four students. This school is in response to the high demand for a school that upholds virtues and creates an avenue where teachers can collaborate with parents in their most important role of educating their children.',
                'content3'=>'It is a school founded on the inspirations and teachings of St. JoseMaria (Founder of Opus Dei) who believed that parents are the primary educators of their children. He also believed that teachers were to work with parents in every phase of their education, giving due consideration to the differences in gender while not forgetting the proper ends Divine Providence assigns to each child in the family and society.',
                'content4'=>'The primary section of The Lagoon School was set up on 15th September, 2008 with the main aim of giving an all-round education to the female child right from the pre-primary stage. It’s academic session started in 2009 on Akanbi Disu street, in Lekki Phase 1 with one pupil in Reception class and eleven students in Year 1. The primary section, which is located within the serene premises of the Secondary School, moved to its permanent site on 14th January, 2012.',
                'content5'=>'NAWA has entrusted the spiritual, doctrinal and moral formation of the students, staff and parents of the school to Opus Dei, a personal prelature in the Catholic Church. Thus the spiritual, doctrinal and moral formation given in the school is Catholic oriented. Opus Dei is Latin for ‘work of God’. It is “a Catholic institution founded by Saint Josemaría Escrivá. Its mission is to spread the message that work and the circumstances of everyday life are occasions for growing closer to God, for serving others, and for improving society.”',
                'content6'=>'The message of Opus Dei is sanctification of work. It is to convert our daily noble activities into sacrifice offered to God. It has to do with working well and putting in ones best. The prelature, however does not assume legal responsibility for the school. We groom our students to always give their best. Their professional work in school is to study.Our Christian identity is incorporated in every aspect of our curriculum. Our students, right from the primary section, learn to serve God out of love by serving their fellow men. They do not just know what it is to be good, they practice it by being charitable to those they come across in their day-to-day activities. Thus our curriculum is such that our students are helped to understand their roles in transforming our great country, Nigeria and the world as a whole.',
            ];
            $about = \App\Models\Page::where(['id'=>1, 'page_category_id'=>1])->first();
            $about->update($default);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('pages', 'content2')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn('content2');
                $table->dropColumn('content3');
                $table->dropColumn('content4');
                $table->dropColumn('content5');
                $table->dropColumn('content6');
                $table->dropColumn('content7');
                $table->dropColumn('content8');
                $table->dropColumn('content9');
                $table->dropColumn('content10');
                $table->dropColumn('img1');
                $table->dropColumn('img2');
                $table->dropColumn('img3');
                $table->dropColumn('img4');
                $table->dropColumn('img5');
                $table->dropColumn('title1');
                $table->dropColumn('title2');
                $table->dropColumn('title3');
            });
        }
    }
}
