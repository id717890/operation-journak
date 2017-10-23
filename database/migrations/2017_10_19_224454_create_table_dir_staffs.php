<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDirStaffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dir_staffs')) {
            Schema::create('dir_staffs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('fio')->nullabel(false);
                $table->string('phone')->nullabel(false);
                $table->string('post')->nullabel(false);
                $table->string('department')->nullabel(false);
                $table->timestamps();
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
        Schema::dropIfExists('dir_staffs');
    }
}
