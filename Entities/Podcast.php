<?php

namespace Modules\Podcasts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Podcast extends Model
{
    use HasFactory;

    // protected static function newFactory()
    // {
    //     return \Modules\Podcasts\Database\factories\PodcastFactory::new();
    // }

    public function category(){
        return $this->belongsTo(PodcastCategories::class, 'id', 'category_id');
    }

    public function episodes(){
        return $this->hasMany(PodcastEpisodes::class, 'podcast_id', 'id')->orderByDesc('episode_number');
    }

    public function favorites(){
        return $this->hasMany(FavoritePodcasts::class, 'podcast_id', 'id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
