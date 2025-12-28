<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable()->default(null); // Allow NULL values and set default to NULL
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('member_id')->nullable()->default(null); // Allow NULL values and set default to NULL
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('task_name')->default('null');
            $table->string('task_date')->default('null');
            $table->string('eta')->default('null');
            $table->string('completed_date')->default('null');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('tasks');
    }
}