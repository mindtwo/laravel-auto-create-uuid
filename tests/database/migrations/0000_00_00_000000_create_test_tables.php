<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->uuid('uuid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
