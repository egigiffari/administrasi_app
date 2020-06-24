<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelImageAddressPhoneToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->after('email');
            $table->string('phone')->after('email');
            $table->string('image')->after('email');
            $table->string('signature')->after('email');
            $table->integer('division_id')->after('email');
            $table->integer('level_id')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('division_id');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('level_id');
            $table->dropColumn('image');
            $table->dropColumn('signature');
        });
    }
}
