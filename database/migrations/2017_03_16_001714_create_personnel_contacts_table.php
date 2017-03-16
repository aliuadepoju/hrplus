<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_id');
            $table->string('street_name', 255)->nullable();
            $table->integer('state_id');
            $table->integer('lga_id');
            $table->string('locality', 255)->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('personnel_contacts');
    }
}
