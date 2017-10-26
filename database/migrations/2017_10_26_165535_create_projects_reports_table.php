<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default('0');
            $table->string('name')->default('');
            $table->boolean('display_on_home')->nullable();
            $table->text('project_id')->nullable();
            $table->text('project_type_id')->nullable();
            $table->text('project_status_id')->nullable();
            $table->integer('in_team')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('display_in_menu')->nullable();
            $table->boolean('visible_on_home')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('set null');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('set null')
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
        Schema::dropIfExists('projects_reports');
    }
}
