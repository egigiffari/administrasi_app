<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->integer('project_id')->default(0);
            $table->string('code')->unique();
            $table->integer('creator_id');
            $table->unsignedBigInteger('applicant_id');
            $table->string('perihal');
            $table->dateTime('start_date')->default(now());
            $table->dateTime('expire_date')->default(now());
            $table->enum('status', ['on proses', 'revision', 'hold', 'cancel', 'approve', 'perbaikan'])->default('on proses');
            $table->text('catatan')->default('');
            $table->integer('total')->default(0);
            $table->string('amount')->default('Nol');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('request_categories')->onDelete('cascade');
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
        Schema::dropIfExists('requests');
    }
}
