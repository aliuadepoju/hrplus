<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unique_id');
            $table->string('title');
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name');
            $table->integer('gender');
            $table->date('dob');
            $table->integer('state_id');
            $table->integer('lga_id');
            $table->string('phone_no');
            $table->string('alternate_phone_no');
            $table->string('email')->unique();
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('personnels', function($table) {
            // $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            // $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            // $table->foreign('lga_id')->references('id')->on('lgas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personnels');
    }
}