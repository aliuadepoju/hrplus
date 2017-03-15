<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNounInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noun_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_id');
            $table->integer('branch_id');
            $table->integer('department_id');
            $table->integer('unit_id');
            $table->string('rank');
            $table->integer('salary_scalling_id');
            $table->date('date_of_entry');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('noun_infos', function($table) {
            // $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            // $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // $table->foreign('personnel_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('noun_infos');
    }
}
