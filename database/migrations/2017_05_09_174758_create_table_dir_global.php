<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDirGlobal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dir_global')) {
            Schema::create('dir_global', function (Blueprint $table) {
                $table->increments('id');
                $table->string('dir_type_id');
                $table->string('caption');
                $table->string('group_name')->nullable(true);
                $table->integer('order')->nullable(true);
                $table->boolean('is_deleted')->default(false);
                $table->timestamps();
                $table->foreign('dir_type_id')->references('id')->on('dir_types')->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('dir_global');
    }
}
