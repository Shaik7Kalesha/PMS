<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('bioid')->unique();
        $table->string('name');
        $table->string('password')->unique();
        $table->string('personalemail')->unique();
        $table->string('officialemail')->unique();
        $table->integer('employeeid')->unique();
        $table->string('experience');
        $table->string('linkedin')->nullable();
        $table->string('portfolio')->nullable();
        $table->string('mobilenumber')->unique();
        $table->string('techstack');
        $table->string('designation');
        $table->date('dateofjoining');
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
        Schema::dropIfExists('members');
    }
}
