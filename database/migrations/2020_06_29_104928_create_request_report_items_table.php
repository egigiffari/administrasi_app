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
            $table->unsignedBigInteger('report_id')->constrained('requests');
            $table->unsignedBigInteger('items')->default(0);
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

            $table->foreign('report_id')->references('id')->on('request_reports')->onDelete('cascade');
            // $table->foreign('items')->references('id')->on('products')->onDelete('cascade');
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
