<?php

namespace Modules\Podcasts\Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Nwidart\Modules\Laravel\Module;
use Modules\Podcasts\Entities\Podcast;
use Illuminate\Database\Eloquent\Model;
use Modules\Podcasts\Entities\PodcastCategories;

class PodcastsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $faker = Factory::create();
        $categories = PodcastCategories::all();
        foreach ($categories as $category) {
            for($i = 0; $i < 3; $i++) {
                Podcast::create([
                    'title' => $faker->name,
                    'description' => $faker->text,
                    'user_id' => 1,
                    'image' => Module::asset('podcasts:assets/podcasts/'.$i.'jpeg'),
                    'category_id' => $category->id,
                    'published' => true,
                    'category_id' => $category->id
                ]);
            }
        }
    }
}
