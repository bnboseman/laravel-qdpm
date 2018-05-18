<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('project_status_id')->nullable();
            $table->integer('project_type_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name')->default('');
            $table->text('description')->nullable();
            $table->text('team')->nullable();
            $table->string('order_tasks_by')->nullable();
            $table->foreign('project_status_id')
                ->references('id')
                ->on('projects_status')
                ->onDelete('set null')
                ->onUpdate('set null');
            $table->foreign('project_type_id')
                ->references('id')
                ->on('projects_types')
                ->onDelete('set null')
                ->onUpdate('set null');
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
        Schema::dropIfExists('projects');
    }
}
