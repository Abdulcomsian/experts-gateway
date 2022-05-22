<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawyersHasExpertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyers_has_expertises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expertise_id');
            $table->unsignedBigInteger('lawyer_profile_id')->nullable();
            $table->foreign('expertise_id')->references('id')->on('expertises');
            $table->foreign('lawyer_profile_id')->references('id')->on('lawyer_profiles');
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
        Schema::dropIfExists('lawyers_has_expertises');
    }
}
