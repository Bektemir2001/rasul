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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_id');
            $table->string('gender');
            $table->integer('level')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'user_student_idx');
            $table->index('type_id', 'type_idx');

            $table->foreign('user_id', 'user_student_fk')->on('users')->references('id');
            $table->foreign('type_id', 'type_fk')->on('types')->references('id');
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
