<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('test_id');
            $table->integer('score');
            $table->decimal('percent', $precision = 8, $scale = 2);
            $table->timestamps();

            $table->index('user_id', 'result_test_user_idx');
            $table->index('test_id', 'result_test_idx');

            $table->foreign('user_id', 'result_test_user_fk')->on('users')->references('id');
            $table->foreign('test_id', 'result_test_fk')->on('tests')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}
