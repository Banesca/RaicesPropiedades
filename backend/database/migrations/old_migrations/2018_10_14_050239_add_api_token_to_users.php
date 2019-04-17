<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApiTokenToUsers extends Migration
{
    public function up()
    {
        Schema::table('tb_users', function (Blueprint $table) {
            $table->char('api_token', 60)->nullable()->after('password');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_users', function (Blueprint $table) {
            $table->dropColumn('api_token');
        });
    }
}
