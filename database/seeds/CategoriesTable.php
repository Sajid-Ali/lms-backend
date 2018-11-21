<?php

use Illuminate\Database\Seeder;

class CategoriesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=> 'Development'
        ]);

        DB::table('categories')->insert([
            'name'=> 'Engineering'
        ]);

        DB::table('categories')->insert([
            'name'=> 'Mathematics'
        ]);
    }
}
