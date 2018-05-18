<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default('0');
            $table->string('name')->default('');
            $table->boolean('display_on_home')->nullable();
            $table->text('project_id')->nullable();
            $table->text('projects_type_id')->nullable();
            $table->text('projects_status_id')->nullable();
            $table->text('discussions_status_id')->nullable();
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
        Schema::dropIfExists('discussions_reports');
    }
}
