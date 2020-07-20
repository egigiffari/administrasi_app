<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('customer');
            $table->string('perihal');
            $table->datetime('start_date');
            $table->datetime('due_date');
            $table->double('total')->default(0);
            $table->string('amount')->default('Nol Rupiah');
            $table->double('ppn')->default(0);
            $table->string('syarat');
            $table->enum('status', ['on proses', 'revision', 'hold', 'cancel', 'approve', 'perbaikan'])->default('on proses');
            $table->text('catatan')->default('');
            $table->timestamps();

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
        Schema::dropIfExists('offers');
    }
}
