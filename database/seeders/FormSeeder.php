<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forms')->insert([
            'name'=>'form1',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('forms')->insert([
            'name'=>'form2',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        /* DB::table('forms')->insert([
             'name'=>'form3',
         ]);*/
    }
}
