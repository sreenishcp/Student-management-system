<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->float('maths');
            $table->float('science');
            $table->float('history');
            $table->enum('term', ['One', 'Two']);
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
        Schema::dropIfExists('mark_lists');
    }
}
