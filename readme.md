To use this Module 
You need to rename the module to "Podcasts" first

To run seed
1. php artisan link:podcasts-assets
2. php artisan module:seed Podcasts



N.B:
* if you face issue like seeder image not working
    - Check if you have run the link:podcasts-assets command
    - If the issue exists, then please check if your index.php file is inside or outside the public directory
        - If the index.php file is outside the public directory please go to "Modules/Podcasts/Database/Seeders" and uncomment the lines containing "$path" value in the PodcastCategoriesTableSeeder.php & PodcastEpisodesTableSeeder.php file. You can also comment out the previous value of "$path".
