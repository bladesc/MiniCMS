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

            DB::table('users')->insert([
                'name' => 'admin' . $i,
                'email' => 'admin' . $i . '@wp.pl',
                'password' => bcrypt('admin')
            ]);
        }

    }
}
