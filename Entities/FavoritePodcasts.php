<?php

namespace Modules\Podcasts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FavoritePodcasts extends Model
{
    use HasFactory;

    // protected static function newFactory()
    // {
    //     return \Modules\Podcasts\Database\factories\FavoritePodcastsFactory::new();
    // }

    public function podcast(){
        return $this->belongsTo(Podcast::class, 'id', 'podcast_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
