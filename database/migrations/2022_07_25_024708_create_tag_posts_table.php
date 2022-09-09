<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained()->references('id')->on('tags')->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('tag_posts');
    }
}
