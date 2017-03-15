<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelQualificationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_qualification_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_id');
            $table->integer('qualification_id');
            $table->integer('field_of_study_id');
            $table->integer('sub_field_of_study_id');
            $table->string('year');
            $table->text('grade');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('personnel_qualification_infos', function($table) {
            // $table->foreign('salary_scale_category_id')->references('id')->on('salary_scale_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personnel_qualification_infos');
    }
}
