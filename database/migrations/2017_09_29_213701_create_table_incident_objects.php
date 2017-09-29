<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIncidentObjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_objects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('incident_id')->unsigned();
            $table->integer('object_id')->unsigned();
            $table->timestamps();

            $table->foreign('incident_id')->references('id')->on('incidents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('object_id')->references('id')->on('dir_global')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_objects');
    }
}
