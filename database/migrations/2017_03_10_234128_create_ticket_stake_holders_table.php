<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketStakeHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_stake_holders', function (Blueprint $table) {
            $table->increments('id');
            $table->ingeger('ticket_id');
            $table->ingeger('stake_holder_id');
            $table->text('reason_for_addition');
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
        Schema::dropIfExists('ticket_stake_holders');
    }
}
