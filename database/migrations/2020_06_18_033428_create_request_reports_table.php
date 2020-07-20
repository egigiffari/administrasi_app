<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('request_id');
            $table->integer('project_id')->default(0);
            $table->unsignedBigInteger('applicant_id');
            $table->string('perihal');
            $table->enum('status', ['on proses', 'revision', 'hold', 'cancel', 'approve', 'perbaikan'])->default('on proses');
            $table->text('catatan')->default('');
            $table->integer('total');
            $table->string('amount');
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('request_categories')->onDelete('cascade');
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->foreign('applicant_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_reports');
    }
}
