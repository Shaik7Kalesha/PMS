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
            $table->string('regno')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->string('department');
            $table->string('batch_year');
            $table->string('mentor_name');
            $table->string('mentor_number');
            $table->string('student_number')->unique();
            $table->string('attendance_status');
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
