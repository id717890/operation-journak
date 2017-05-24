<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start_date')->nullable(false);
            $table->datetime('end_date')->nullable();
            $table->integer('dir_type_id')->unsigned();
            $table->text('object_caption');
            $table->integer('author_id')->unsigned();
            $table->string('who_was_notified')->nullable();
            $table->text('actions')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->text('other')->nullable();
            $table->text('issue')->nullable(false);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dir_type_id')->references('id')->on('dir_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
