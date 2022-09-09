<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained()->references('id')->on('b_tags')->onDelete('cascade');
            $table->foreignId('blog_id')->constrained()->references('id')->on('blogs')->onDelete('cascade');
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
        Schema::dropIfExists('tag_blogs');
    }
}
