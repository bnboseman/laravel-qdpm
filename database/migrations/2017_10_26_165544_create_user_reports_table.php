<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default('0');
            $table->string('name')->default('');
            $table->boolean('display_on_home')->nullable();
            $table->text('projects_id')->nullable();
            $table->text('projects_type_id')->nullable();
            $table->text('projects_status_id')->nullable();
            $table->text('assigned_to')->nullable();
            $table->text('tasks_status_id')->nullable();
            $table->text('tasks_type_id')->nullable();
            $table->text('tasks_label_id')->nullable();
            $table->date('due_date_from')->nullable();
            $table->date('due_date_to')->nullable();
            $table->date('created_from')->nullable();
            $table->date('created_to')->nullable();
            $table->date('closed_from')->nullable();
            $table->date('closed_to')->nullable();
            $table->integer('sort_order')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reports');
    }
}
