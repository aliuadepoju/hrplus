<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubFieldOfStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_field_of_studies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('field_of_study_id');
            $table->string('sub_fos_name');
            $table->text('description');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('sub_field_of_studies', function($table) {
            // $table->foreign('field_of_study_id')->references('id')->on('field_of_studies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_field_of_studies');
    }
}
