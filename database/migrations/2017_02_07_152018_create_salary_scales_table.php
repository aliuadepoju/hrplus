<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_scales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salary_scale_category_id');
            $table->string('scale');
            $table->integer('grouping');
            $table->double('min_sal_range');
            $table->double('max_sal_range');
            $table->text('description');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('salary_scales', function($table) {
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
        Schema::drop('salary_scales');
    }
}
