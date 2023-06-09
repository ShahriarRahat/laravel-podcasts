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
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191)->index();
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('image')->comment('path')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('podcast_categories')->onDelete('cascade');
            $table->boolean('published')->default(false);
            $table->boolean('downloadable')->default(false);
            $table->string('status')->default(App\Enums\Status::ACTIVE);
            $table->enum('type', ['free', 'paid'])->default('free')->index();
            $table->integer('free_listenables')->nullable();
            $table->unsignedBigInteger('likes_count')->default(0);
            $table->unsignedBigInteger('comments_count')->default(0);
            $table->unsignedBigInteger('views_count')->default(0);
            $table->unsignedBigInteger('shares_count')->default(0);
            $table->unsignedBigInteger('followers_count')->default(0)->comment('who have added this podcast as favorite');

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
        Schema::dropIfExists('podcasts');
    }
};
