<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlueCollarStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blue_collar_staff', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('campus_id');
			$table->string('name');
			$table->string('image');
			$table->string('cnic');
			$table->string('dob');
			$table->enum('gender',['male','female','other']);
			$table->string('father_name');
			$table->string('father_cnic');
			$table->string('phone');
			$table->string('emergency_phone');
			$table->string('marital_status');
			$table->string('husband_name')->nullable();
			$table->string('husband_cnic')->nullable();
			$table->string('department');
			$table->tinyInteger('accommodation');
			$table->tinyInteger('transport');
			$table->string('pay');
			$table->string('address');
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
        Schema::dropIfExists('blue_collar_staff');
    }
}
