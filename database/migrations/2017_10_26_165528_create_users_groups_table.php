<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->boolean('allow_view_all')->nullable();
            $table->boolean('allow_manage_projects')->nullable();
            $table->boolean('allow_manage_tasks')->nullable();
            $table->boolean('allow_manage_tickets')->nullable();
            $table->boolean('allow_manage_users')->nullable();
            $table->boolean('allow_manage_configuration')->nullable();
            $table->boolean('allow_manage_tasks_viewonly')->nullable();
            $table->boolean('allow_manage_discussions')->nullable();
            $table->boolean('allow_manage_discussions_viewonly')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_groups');
    }
}
