<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('user_id');
            $table->string('cnic');
            $table->string('dob');
            $table->enum('gender',['male','female','other']);
            $table->string('father_name');
            $table->string('father_cnic');
            $table->string('father_occupation');
            $table->enum('marital_status',['married','unmarried']);
            $table->string('husband_name')->nullable();
            $table->string('husband_cnic')->nullable();
            $table->string('department');
            $table->string('subject');
            $table->string('phone');
            $table->string('emergency_phone');
            $table->string('pay');
            $table->string('address');
            $table->tinyInteger('accommodation');
            $table->tinyInteger('transport');
            $table->string('designation');
            $table->string('appointment_status');
            $table->string('joining_date');
            $table->string('application_date');
            $table->string('applied_for');
            $table->string('call_letter_date');
            $table->string('interview_date');
            $table->string('remarks');
            $table->string('trial_start');
            $table->string('trial_end');
            $table->string('probation_start');
            $table->string('probation_end');
            $table->string('preliminary_end');
            $table->string('extra_duty');
            $table->json('qualification');
            $table->json('courses');
            $table->json('experience');
            $table->json('documents');
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
        Schema::dropIfExists('teacher_profiles');
    }
}
