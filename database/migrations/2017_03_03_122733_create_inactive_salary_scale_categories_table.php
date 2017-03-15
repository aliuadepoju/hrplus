<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInactiveSalaryScaleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inactive_salary_scale_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salary_scale_category_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('inactive_salary_scale_categories');
    }
}
