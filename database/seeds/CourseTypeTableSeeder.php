<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_types')->insert([
            'type'=> 'Uploadable Course'
        ]);

        DB::table('course_types')->insert([
            'type'=> 'Live Course'
        ]);
    }
}
