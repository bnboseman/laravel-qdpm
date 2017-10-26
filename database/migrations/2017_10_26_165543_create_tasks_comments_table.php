<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->default('0');
            $table->integer('user_id')->nullable();
            $table->integer('tasks_status_id')->nullable();
            $table->integer('tasks_priority_id')->nullable();
            $table->date('due_date')->nullable();
            $table->float('worked_hours', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->integer('progress')->nullable();
            $table->timestamps();

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('set null');
            $table->foreign('tasks_status_id')
                ->references('id')
                ->on('tasks_status')
                ->onDelete('set null')
                ->onUpdate('set null');
            $table->foreign('tasks_priority_id')
                ->references('id')
                ->on('tasks_priority')
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
        Schema::dropIfExists('tasks_comments');
    }
}
