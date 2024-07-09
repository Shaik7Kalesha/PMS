<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMemberIdToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            
            $table->unsignedBigInteger('member_id')->nullable()->default(null)->after('id'); // Allow NULL values and set default to NULL
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropColumn('member_id');
        });
    }
}
