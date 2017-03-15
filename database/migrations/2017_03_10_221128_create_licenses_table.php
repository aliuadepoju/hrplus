<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('license_key');
            $table->string('hash_code');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('system_freeze_on_expire');
            $table->integer('status'); //1 = Active; 2 = Trial Period; 3 = Expired;
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
        Schema::dropIfExists('licenses');
    }
}
