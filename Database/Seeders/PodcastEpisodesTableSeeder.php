<?php

namespace Modules\Podcasts\Database\Seeders;

use Illuminate\Database\Seeder;
use Nwidart\Modules\Facades\Module;
use Modules\Podcasts\Entities\Podcast;
use Illuminate\Database\Eloquent\Model;
use Modules\Podcasts\Entities\PodcastEpisodes;

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
        $path = 'podcasts/podcasts/';

            /**********  if you have index.php outside of the public directory the uncomment the line below  **********/
            // $path = 'public/podcasts/podcasts/';

        foreach ($podcasts as $podcast) {
            for($i = 0; $i < random_int(3, 9); $i++) {
                PodcastEpisodes::create([
                    'title' => $podcast->title,
                    'description' => $podcast->description,
                    'episode_number' => $podcast->episode_number,
                    'podcast_id' => $podcast->id,
                    'image' => asset($path.'images/'.$i.'jpeg'),
                    'audio_url' => asset($path.'audio/'.$i.'mp3'),
                    'duration' => gmdate('H:i:s', random_int(360, 8640)),
                    'release_date' => $podcast->release_date,
                    'published' => $podcast->published,
                ]);
            }
        }
    }
}
