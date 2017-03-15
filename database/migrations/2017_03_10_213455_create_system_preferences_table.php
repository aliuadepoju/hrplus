<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_preferences',function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('logo');
            $table->boolean('sms_notification')->default(false);
            $table->boolean('email_notification')->default(false);
            $table->string('email_outgoing_address');
            $table->text('email_outgoing_password');
            $table->string('email_outgoing_server');
            $table->tinyInteger('email_port');
            $table->boolean('document_upload')->default(false);
            $table->string('admin_email');
            $table->string('admin_phone');
            $table->string('hr_admin_email');
            $table->string('hr_admin_phone');
            $table->string('maintenance_admin_email');
            $table->string('maintenance_admin_phone');
            $table->integer('license_id');
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
        Schema::drop('system_preferences');
    }
}
