<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->text('description')->nullable();
            $table->string('target')->nullable();
            $table->boolean('status')->default(1);
            $table->string('external_url')->nullable();
            $table->char('redirect', 3)->nullable();
            $table->string('author')->nullable();
            $table->string('payment_link')->nullable();
            $table->integer('order')->nullable();
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('posts');
    }
}
