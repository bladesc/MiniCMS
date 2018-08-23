<?php

use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++) {

            DB::table('cms')->insert([
                'name' => 'O nas' . $i,
                'html' => 'html' . $i,
                'visible' => true
            ]);
        }
    }
}
