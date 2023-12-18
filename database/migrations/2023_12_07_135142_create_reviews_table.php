<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');
            // $table->unsignedBigInteger('user_id');
            $table->string('username');
            // $table->unsignedBigInteger('movie_id');
            $table->decimal('rating', 3, 1);
            $table->text('comment');
            $table->timestamp('review_date')->useCurrent();
            $table->timestamps();

            // Define foreign key constraints
            // $table->foreign('user_id')->references('user_id')->on('users');
            // $table->foreign('movie_id')->references('movie_id')->on('movies');
            // $table->foreign('username')->references('username')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
