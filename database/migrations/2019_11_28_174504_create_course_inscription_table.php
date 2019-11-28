<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseInscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_inscription', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_id')->unsigned();
            $table->unsignedBigInteger('inscription_id');
            $table->string('course')->nullable();
            $table->integer('amount')->nullable();
            $table->double('price', 10, 2)->nullable();
            $table->double('subtotal', 10, 2)->nullable();


            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('inscription_id')->references('id')->on('inscriptions')->onDelete('cascade');

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
        Schema::dropIfExists('course_inscription');
    }
}
