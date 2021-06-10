<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('type')->nullable();
            $table->integer('category')->nullable();
            $table->integer('district')->nullable();
            $table->integer('post')->nullable();
            $table->integer('setting')->nullable();
            $table->integer('website')->nullable();
            $table->integer('gallery')->nullable();
            $table->integer('advertisement')->nullable();
            $table->integer('role')->nullable();
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
            //
        });
    }
}
