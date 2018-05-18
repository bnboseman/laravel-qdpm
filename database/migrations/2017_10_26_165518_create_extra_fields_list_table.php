<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraFieldsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_fields_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('extra_field_id')->default('0');
            $table->integer('bind_id')->default('0');
            $table->text('value');
            $table->foreign('extra_field_id')
                ->references('id')
                ->on('extra_fields')
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
        Schema::dropIfExists('extra_fields_list');
    }
}
