<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestReportItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_report_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('report_id')->constrained('requests');
            $table->integer('items');
            $table->string('name');
            $table->string('merk');
            $table->string('spec');
            $table->string('unit');
            $table->double('qty');
            $table->double('price');
            $table->double('sub');
            $table->text('desc');
            $table->string('image')->default('uploads/requests/items/default.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_report_items');
    }
}
