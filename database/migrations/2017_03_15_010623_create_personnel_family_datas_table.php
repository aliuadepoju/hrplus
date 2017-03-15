<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelFamilyDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_family_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_id');
            $table->integer('marrital_status');
            $table->integer('no_of_children')->nullable();
            $table->string('spouse')->nullable();
            $table->string('spouse_phone_no')->nullable();
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
        Schema::dropIfExists('personnel_family_datas');
    }
}
