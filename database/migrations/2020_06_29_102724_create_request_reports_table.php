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
            $table->integer('category_id');
            $table->integer('request_id');
            $table->integer('project_id')->default(0);
            $table->integer('applicant_id');
            $table->string('perihal');
            $table->enum('status', ['on proses', 'revision', 'hold', 'cancel', 'approve', 'perbaikan'])->default('on proses');
            $table->integer('total');
            $table->string('amount');
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
        Schema::dropIfExists('request_reports');
    }
}
