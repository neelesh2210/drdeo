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
            $table->string('title');
            $table->text('specialization');
            $table->string('designation');
            $table->string('experience');
            $table->string('gender');
            $table->string('adhar_card');
            $table->string('pan_card');
            $table->string('degree');
            $table->string('institute_name');
            $table->string('year_of_completion');
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
