<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
//                $table->string('email')->unique();
                $table->string('login')->unique();
//                $table->boolean('email_confirmed')->default(0);
                $table->string('password');
                $table->boolean('lockout_enabled')->default(0);
                $table->rememberToken();
                $table->string('confirm_token', 100)->nullable()->default(null);
                $table->boolean('is_delete')->nullable(false)->default(false);
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
        Schema::dropIfExists('users');
    }
}
