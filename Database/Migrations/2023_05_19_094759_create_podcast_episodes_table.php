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
        Schema::create('podcast_episodes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191)->index();
            $table->text('description')->nullable();
            $table->integer('episode_number')->nullable()->index();
            $table->foreignId('podcast_id')->constrained('podcasts')->onDelete('cascade');
            $table->string('image')->comment('path')->nullable();
            $table->string('audio_url')->comment('path')->nullable();
            $table->time('duration')->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('published')->default(false);
            $table->string('status')->default(App\Enums\Status::ACTIVE);
            $table->unsignedBigInteger('likes_count')->default(0);
            $table->unsignedBigInteger('comments_count')->default(0);
            $table->unsignedBigInteger('views_count')->default(0);
            $table->unsignedBigInteger('shares_count')->default(0);
            $table->unsignedBigInteger('downloads_count')->default(0);
            $table->unsignedBigInteger('followers_count')->default(0)->comment('who have added this podcast episode as favorite');

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
        Schema::dropIfExists('podcast_episodes');
    }
};
