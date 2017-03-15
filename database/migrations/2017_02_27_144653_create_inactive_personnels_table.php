<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInactivePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inactive_personnels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_id');
            // $table->foreign('personnel_id')->references('id')->on('personnels');
            $table->integer('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->text('reason_for_deactivation')->nullable();
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('inactive_personnels');
    }
}
