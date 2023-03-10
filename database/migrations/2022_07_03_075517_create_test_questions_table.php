<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->unsignedBigInteger('test_id');
            $table->string('first_answer');
            $table->string('second_answer');
            $table->string('third_answer');
            $table->integer('right_answer');
            $table->integer('score');
            $table->timestamps();

            $table->index('test_id', 'test_idx');
            $table->foreign('test_id', 'test_fk')->on('tests')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_questions');
    }
}
