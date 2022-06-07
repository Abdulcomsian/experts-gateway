<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawyerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->string('title')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->longText('address')->nullable();
            $table->integer('complete')->nullable();
            $table->longText('b_image')->nullable();
            $table->longText('image')->nullable();
            $table->string('partise_area')->nullable();
            $table->string('secondary_partise_area')->nullable();
            $table->string('third_partise_area')->nullable();
            $table->longText('membership_id')->nullable();
            $table->longText('education_id')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('lawyer_profiles');
    }
}
