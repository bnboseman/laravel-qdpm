<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->nullable();
            $table->integer('tickets_types_id')->nullable();
            $table->integer('tickets_status_id')->nullable();
            $table->string('name')->default('');
            $table->text('description')->nullable();
            $table->integer('user_id')->default('0');
            $table->integer('project_id')->default('0');
            $table->timestamps();

            $table->foreign('tickets_status_id')
                ->references('id')
                ->on('tickets_status')
                ->onDelete('set null')
                ->onUpdate('set null');
            $table->foreign('tickets_types_id')
                ->references('id')
                ->on('tickets_types')
                ->onDelete('set null')
                ->onUpdate('set null');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('department_id')
                ->references('id')
                ->on('departmentss')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
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
        Schema::dropIfExists('tickets');
    }
}
