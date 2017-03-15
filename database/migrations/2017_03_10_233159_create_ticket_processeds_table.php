<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketProcessedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_processeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id');
            $table->integer('user_id');
            $table->integer('ticket_status_id');
            $table->text('process_note');
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
        Schema::dropIfExists('ticket_processeds');
    }
}
