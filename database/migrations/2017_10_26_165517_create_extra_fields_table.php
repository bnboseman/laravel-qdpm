<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('bind_type')->default('');
            $table->string('type')->nullable();
            $table->integer('sort_order')->nullable()->default('0');
            $table->boolean('active')->nullable();
            $table->boolean('display_in_list')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_fields');
    }
}
