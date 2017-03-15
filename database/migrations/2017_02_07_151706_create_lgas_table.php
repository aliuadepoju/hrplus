<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLgasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lgas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state_id');
            $table->string('lga_name');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('lgas', function($table) {
            // $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lgas');
    }
}
