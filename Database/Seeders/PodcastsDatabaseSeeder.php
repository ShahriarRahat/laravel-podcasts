<?php

namespace Modules\Podcasts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\Podcasts\Database\Seeders\PodcastsTableSeeder;
use Modules\Podcasts\Database\Seeders\FavoritePodcastTableSeeder;
use Modules\Podcasts\Database\Seeders\PodcastEpisodesTableSeeder;
use Modules\Podcasts\Database\Seeders\PodcastCategoriesTableSeeder;

class PodcastsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(PodcastCategoriesTableSeeder::class);
        $this->call(PodcastsTableSeeder::class);
        $this->call(PodcastEpisodesTableSeeder::class);
        $this->call(FavoritePodcastTableSeeder::class);
        
        Artisan::call('module:seed', [
            'module' => 'Course',
            '--class' => 'CourseTableSeeder'
        ]);

    }
}
