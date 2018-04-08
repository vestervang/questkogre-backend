<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsArticleCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_article_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_article_id')->unsigned()->index();
            $table->text('comment');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
    
            $table->foreign('news_article_id')->references('id')->on('news_articles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_article_comments');
    }
}
