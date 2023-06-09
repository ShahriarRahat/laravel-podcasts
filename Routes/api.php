<?php

use Illuminate\Support\Facades\Route;
use Modules\Podcasts\Http\Controllers\Api\PodcastsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/podcasts')->group(function () {
    Route::get('/',                                     [PodcastsController::class, 'index'])->name('podcasts.index');
    Route::get('/categories',                           [PodcastsController::class, 'categories'])->name('podcasts.categories');
    Route::get('/episodes',                             [PodcastsController::class, 'episodes'])->name('podcasts.episodes');
    Route::get('/favorites',                            [PodcastsController::class, 'favorites'])->name('podcasts.favorites');
    Route::get('like-unlike/{category}/{id}',           [PodcastsController::class, 'likeUnlike'])->name('podcasts.likeUnlike');
});
