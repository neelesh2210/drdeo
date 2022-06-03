<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_id');
            $table->string('title')->nullable();
            $table->text('specialization')->nullable();
            $table->string('designation')->nullable();
            $table->string('experience')->nullable();
            $table->string('gender')->nullable();
            $table->string('adhar_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('degree')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('year_of_completion')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('registration_id')->nullable();
            $table->string('registration_council_name')->nullable();
            $table->string('year_of_registration')->nullable();
            $table->string('registration_document')->nullable();
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
        Schema::dropIfExists('doctor_profiles');
    }
}
