<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelPromotionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_promotion_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->integer('personnel_id');
            $table->integer('old_scale_id');
            $table->integer('new_scale_id');
            $table->date('wef');
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
        Schema::dropIfExists('personnel_promotion_infos');
    }
}
