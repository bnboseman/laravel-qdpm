<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->default('0');
            $table->integer('tasks_status_id')->nullable();
            $table->integer('tasks_priority_id')->nullable();
            $table->integer('tasks_type_id')->nullable();
            $table->integer('tasks_label_id')->nullable();
            $table->integer('tasks_groups_id')->nullable();
            $table->integer('projects_phases_id')->nullable();
            $table->integer('version_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name')->default('');
            $table->text('description')->nullable();
            $table->string('assigned_to')->nullable();
            $table->float('estimated_time', 8, 2)->nullable();
            $table->integer('ticket_id')->nullable();
            $table->date('due_date')->nullable();
            $table->date('closed_date')->nullable();
            $table->integer('discussion_id')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('progress')->nullable();
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets')
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
            $table->foreign('tasks_type_id')
                ->references('id')
                ->on('tasks_types')
                ->onDelete('set null')
                ->onUpdate('set null');
            $table->foreign('tasks_label_id')
                ->references('id')
                ->on('tasks_labels')
                ->onDelete('set null')
                ->onUpdate('set null');
            $table->foreign('tasks_groups_id')
                ->references('id')
                ->on('tasks_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('projects_phases_id')
                ->references('id')
                ->on('projects_phases')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('version_id')
                ->references('id')
                ->on('versions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('tasks');
    }
}
