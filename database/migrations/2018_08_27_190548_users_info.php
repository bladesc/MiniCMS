<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_users');
            $table->char('name', 255);
            $table->char('surname', 255);
            $table->char('address', 255);
            $table->char('city', 255);
            $table->char('zip_code', 255);
            $table->char('number', 255);
            $table->char('avatar', 255);
            $table->timestamps();
        });
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
