<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('slug');
            $table->char('age', 3);
            $table->char('gender', 1);
            $table->string('marital_status');
            $table->string('some_charges');
            $table->string('image');
            $table->text('description');
            $table->text('content');
            $table->boolean('enabled')->default(1);
            $table->string('external_url');
            $table->char('redirect', 3);
            $table->string('author');
            $table->integer('order');
            $table->boolean('have_job')->nullable();
            $table->string('office')->nullable();
            $table->string('company')->nullable();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('career_id');
            $table->foreign('career_id')->references('id')->on('careers');

            $table->unsignedInteger('period_id');
            $table->foreign('period_id')->references('id')->on('periods');
            
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
        Schema::dropIfExists('trainees');
    }
}
