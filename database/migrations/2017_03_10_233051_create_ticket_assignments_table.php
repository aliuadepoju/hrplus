<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id');
            $table->integer('assigned_to');
            $table->integer('assigned_by');
            $table->integer('expected_days');
            $table->integer('status');
            // $table->foreign('ticket_id')->references('id')->on('tickets');
            // $table->foreign('assigned_to')->references('id')->on('user');
            // $table->foreign('assigned_by')->references('id')->on('users');
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
        Schema::dropIfExists('ticket_assignments');
    }
}
