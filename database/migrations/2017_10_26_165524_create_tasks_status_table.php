<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('group')->default('');
            $table->integer('sort_order')->nullable()->default('0');
            $table->boolean('default_value')->nullable();
            $table->boolean('active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_status');
    }
}
