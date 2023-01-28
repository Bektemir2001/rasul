<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('semester_id');
            $table->text('content');
            $table->string('image');
            $table->string('gender');
            $table->timestamps();
            $table->softDeletes();

            $table->index('semester_id', 'semester_lesson_idx');
            $table->foreign('semester_id', 'semester_lesson_fk')->on('semesters')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
