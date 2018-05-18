<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_group_id')->nullable();
            $table->string('name')->default('');
            $table->string('photo')->nullable();
            $table->string('email')->unique();
            $table->string('culture')->nullable();
            $table->string('password');
            $table->boolean('active')->nullable();
            $table->string('skin')->nullable();
            $table->timestamps();

            $table->foreign('users_group_id')
                ->references('id')
                ->on('user_groups')
                ->onDelete('set null')
                ->onUpdate('set null');
        });
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
