<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestReportApprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_report_approves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('report_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['waiting', 'revision', 'hold', 'cancel', 'acc', 'perbaikan'])->default('waiting');
            $table->string('position');
            $table->string('subject');
            $table->integer('priority');
            $table->timestamps();

            $table->foreign('report_id')->references('id')->on('request_reports')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_report_approves');
    }
}
