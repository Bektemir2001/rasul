<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_accesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('test_id');
            $table->integer('time');
            $table->timestamps();

            $table->index('user_id', 'test_success_user_idx');
            $table->index('test_id', 'test_success_idx');

            $table->foreign('user_id', 'test_success_user_fk')->on('users')->references('id');
            $table->foreign('test_id', 'test_success_fk')->on('tests')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_accesses');
    }
}
