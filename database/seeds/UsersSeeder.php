<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => 'nick' . $i,
                'email' => 'admin' . $i . '@wp.pl',
                'password' => bcrypt('admin'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
