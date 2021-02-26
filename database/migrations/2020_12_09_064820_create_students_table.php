<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campus_id');

            $table->string('name');
            $table->string('father_name');
            $table->string('dob');
            $table->enum('gender',['male','female','other']);
            $table->string('roll_number');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('section_id');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('emergency_phone');
            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->string('guardian_cnic')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('email');
            $table->string('city');
            $table->string('district');
            $table->string('address');
            $table->tinyInteger('transport');
            $table->string('family_code');
            $table->string('fee');
            $table->string('last_fee');
            $table->string('image');
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
        Schema::dropIfExists('students');
    }
}
