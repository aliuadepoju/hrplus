<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_id')->references('id')->on('personnel')->onDelete('cascade');
            $table->integer('document_classification_id')->references('id')->on('document_classification')->onDelete('cascade');
            $table->string('title');
            $table->string('issuing_authority');
            $table->string('document_no')->nullable();
            $table->date('expiration')->nullable();
            $table->text('description');
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
        Schema::drop('documents');
    }
}
