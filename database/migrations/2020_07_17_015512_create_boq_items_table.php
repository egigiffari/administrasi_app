<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoqItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boq_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('boq_id');
            $table->string('item');
            $table->text('spec');
            $table->integer('volume');
            $table->string('unit');
            $table->double('price');
            $table->double('sub');

            $table->foreign('boq_id')->references('id')->on('boqs')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boq_items');
    }
}
