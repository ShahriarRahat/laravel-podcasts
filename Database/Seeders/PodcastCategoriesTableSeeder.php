<?php

namespace Modules\Podcasts\Database\Seeders;

use Illuminate\Database\Seeder;
use Nwidart\Modules\Facades\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\Podcasts\Entities\PodcastCategories;

class PodcastCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $categories = [
            [
                'title' => 'Technology',
                'description' => 'Technology podcasts for everyone'
            ],
            [
                'title' => 'Business',
                'description' => 'Business podcasts for everyone'
            ],
            [
                'title' => 'Education',
                'description' => 'Education podcasts for everyone'
            ],
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            $path = 'podcasts/categories/';

            /**********  if you have index.php outside of the public directory the uncomment the line below  **********/
            // $path = 'public/podcasts/categories/';

            $category['image'] = asset($path . $category['title'] . '.jpeg');
            PodcastCategories::create($category);
        }
    }
}
