<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1;$i<11;$i++) {
            DB::table('account_information')->insert([
                'id_users' =>  $i,
                'name' => 'jan' . $i,
                'surname' => 'kowalski',
                'address' => 'pomorska 21/3',
                'city' => 'opole',
                'zip_code' => '23-323',
                'number' => '123 123 123',
                'avatar' => 'url/to/avatar',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
