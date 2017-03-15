<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNextOfKinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_of_kins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_id')->unique();
            $table->integer('relationship_id');
            $table->string('surname');
            $table->string('middle_name');
            $table->string('first_name');
            $table->integer('gender');
            $table->date('dob');
            $table->string('phone_no');
            $table->string('alternate_phone_no')->nullable();
            $table->text('residential_address')->nullable();
            $table->integer('status')->unsigned()->default(1);
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
        Schema::drop('next_of_kins');
    }
}
