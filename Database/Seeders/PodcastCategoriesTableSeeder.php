<?php

namespace Modules\Podcasts\Database\Seeders;

use Illuminate\Database\Seeder;
use Nwidart\Modules\Laravel\Module;
use Illuminate\Database\Eloquent\Model;
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
                'name' => 'Technology',
                'description' => 'Technology podcasts for everyone'
            ],
            [
                'name' => 'Business',
                'description' => 'Business podcasts for everyone'
            ],
            [
                'name' => 'Education',
                'description' => 'Education podcasts for everyone'
            ],
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            $category['image'] = Module::asset('podcasts:assets/categories/' . $category['name'] . '.jpeg');
            PodcastCategories::create($category);
        }
    }
}
