<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<5;$i++) {

            DB::table('cms')->insert([
                'name' => 'O nas' . $i,
                'html' => 'html' . $i,
                'visible' => true
            ]);
        }

    }
}
