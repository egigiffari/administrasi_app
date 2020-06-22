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
            $table->integer('category_id');
            $table->integer('project_id')->default(0);
            $table->string('code')->unique();
            $table->integer('creator_id');
            $table->integer('applicant_id');
            $table->string('perihal');
            $table->dateTime('start_date')->default(now());
            $table->dateTime('expire_date')->default(now());
            $table->enum('status', ['on proses', 'revision', 'hold', 'cancel', 'approve']);
            $table->integer('total')->default(0);
            $table->string('amount')->default('Nol');
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
        Schema::dropIfExists('requests');
    }
}
