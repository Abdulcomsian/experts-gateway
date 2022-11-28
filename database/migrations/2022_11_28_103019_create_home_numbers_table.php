<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('active_members')->nullable();
            $table->integer('years_of_excellence')->nullable();
            $table->integer('key_countries')->nullable();
            $table->integer('trust_rating')->nullable();
            $table->integer('areas_of_expertise')->nullable();
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
        Schema::dropIfExists('home_numbers');
    }
}
