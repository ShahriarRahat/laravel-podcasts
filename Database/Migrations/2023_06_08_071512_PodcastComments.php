<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcast_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->morphs('commentable');
            $table->foreignId('comment_id')->nullable()->constrained('comments')->onDelete('cascade')->comment('parent comment');
            $table->text('content')->nullable();
            $table->integer('edited')->default(0)->comment('how many times it has been edited');
            $table->integer('deleted')->default(0);
            $table->tinyInteger('type')->default(0)->comment('0-comment, 1-reply');
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
        //
    }
};
