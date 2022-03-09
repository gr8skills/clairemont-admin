<?php

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedAllAbout extends Migration
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
            'content'=>'Welcome to Our Great School!. <br/><br/>
                            The Lagoon School aims at investing in the Nigerian girl child
                            for the good of the society. We have both primary and secondary sections. Our school has a
                            reputation of high moral and academic standards. We have been able to achieve these through
                            our mission: ‘partnership with the parents to give an all-round education to the students,
                            based on the dignity of the human person, integrity, leadership qualities and academic
                            excellence’ and our vision: ‘Christian Identity’.<br /><br />
                            I welcome you- parents, teachers,
                            students, prospective parents and guests- to explore our website.<br /><br />
                            To our parents: You can
                            keep up to date with your daughter’s progress in the school, be it academic or
                            extra-curricular. You also have access to schedules of interesting activities specially
                            organised for you and your children.<br /><br />
                            To our teachers: This is another great avenue for
                            getting across to parents and students and communicating with one another.<br /><br />
                            To the students:
                            I encourage you to visit the website as often as possible to get the latest updates on your
                            assignments and projects.<br /><br />
                            To prospective parents and guests: we hope that the information on
                            our website will be of interest to you and will excite you into joining this great family of
                            The Lagoon School.<br /><br />
                            We would be grateful to receive suggestions and feedback. For more
                            information, do not hesitate to contact us.<br /><br />
                            Warmly, Isebor Margaret Head of School',
            'content2'=>'',
        ];
        $meetHead = Page::where('slug','LIKE','%'.'meet-the-head'.'%')->first();
        $meetHead->update($default);

        $default2 = [
            'content'=>'The Lagoon School is open to girls of all cultural, religious and ethnic backgrounds. Our
                    educational model is based on our mission statement: Partnership with parents to give an all-round
                    education to each child based on the dignity of the human person, integrity, leadership qualities
                    and academic excellence.',
            'content2'=>'The Lagoon School believes that education is not just about learning subjects but also about learning
                    the value of being a good person. We build characters, form and develop the total person. Thus our
                    curriculum is geared towards developing the intellectual, physiological, psychological, ethical,
                    social and spiritual dimensions of the learners. Our students have learnt to take responsibility for
                    their learning. Each child is empowered to achieve the best in whatever task she engages in. Our
                    driving force is a desire to achieve a Christian identity for the school.',
            'content3'=>'',
            'content4'=>'',
            'content5'=>'',
            'content6'=>'',
        ];
        $philosophy = Page::where('slug','LIKE','%'.'educational-philosophy'.'%')->first();
        $philosophy->update($default2);

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
