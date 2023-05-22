<?php

namespace Modules\Podcasts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Podcasts\Entities\Podcast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class PodcastEpisodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $table->string('title', 191);
        // $table->text('description')->nullable();
        // $table->integer('episode_number')->nullable();
        // $table->foreignId('podcast_id')->constrained('podcasts')->onDelete('cascade');
        // $table->string('image')->comment('path')->nullable();
        // $table->string('audio_url')->comment('path')->nullable();
        // $table->time('duration')->nullable();
        // $table->date('release_date')->nullable();
        // $table->boolean('published')->default(false);

        $podcasts = Podcast::all();
        foreach ($podcasts as $podcast) {
            $podcast->episodes()->saveMany(Factory::of(Modules\Podcasts\Entities\PodcastEpisode::class)->make());
        }
    }
}
