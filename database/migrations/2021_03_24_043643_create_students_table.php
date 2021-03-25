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
            $table->increments('id');
            $table->bigInteger('student_id');
            $table->string('name');
            $table->integer('age');
            $table->enum('gender', ['M', 'F']);
            $table->integer('teacher_id');
            $table->boolean('active_status')->deafult(0)->comment('0 = Active');
            $table->boolean('delete_status')->deafult(0)->comment('1 = Deleted');
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
