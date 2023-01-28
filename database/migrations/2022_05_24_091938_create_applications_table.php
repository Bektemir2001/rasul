<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('passport_image');
            $table->string('certificate_image');
            $table->text('message');
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'user_idx');
            $table->index('type_id', 'type_idx');

            $table->foreign('user_id', 'user_application_fk')->on('users')->references('id');
            $table->foreign('type_id', 'type_application_fk')->on('types')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
