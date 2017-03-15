<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serial');
            $table->string('title');
            $table->integer('category_id');
            $table->integer('priority');
            $table->integer('user_id');
            $table->date('dated');
            $table->integer('assigned_to')->nullable();
            $table->integer('assigned_by')->nullable();
            $table->integer('expected_delivery')->nullable();
            $table->integer('status');
            $table->text('description');
            $table->date('date_assigned')->nullable();
            $table->date('deleted_at')->nullable();
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
        Schema::drop('tickets');
    }
}
