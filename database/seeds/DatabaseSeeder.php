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
        for ($i=0;$i<10;$i++) {

            DB::table('menu')->insert([
                'name' => str_random(10),
                'url' => str_random(10),
                'visible' => true
            ]);
        }

    }
}
