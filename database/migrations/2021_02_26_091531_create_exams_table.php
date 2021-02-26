<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('student_id');
            $table->string('name');
            $table->string('date');
            $table->json('result');
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
        Schema::dropIfExists('exams');
    }
}
