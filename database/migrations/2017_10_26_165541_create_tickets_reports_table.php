<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->default('0');
            $table->string('name')->default('');
            $table->boolean('display_on_home')->nullable();
            $table->text('project_id')->nullable();
            $table->text('projects_type_id')->nullable();
            $table->text('projects_status_id')->nullable();
            $table->text('departments_id')->nullable();
            $table->text('tickets_types_id')->nullable();
            $table->text('tickets_status_id')->nullable();
            $table->integer('sort_order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets_reports');
    }
}
