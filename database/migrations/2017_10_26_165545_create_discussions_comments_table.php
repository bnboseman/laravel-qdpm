<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->default('0');
            $table->integer('user_id')->nullable();
            $table->integer('discussions_status_id')->nullable();
            $table->string('name')->default('');
            $table->text('description')->nullable();
            $table->string('assigned_to')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discussions_comments');
    }
}
