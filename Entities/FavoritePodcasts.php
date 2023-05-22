<?php

namespace Modules\Podcasts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FavoritePodcasts extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Podcasts\Database\factories\FavoritePodcastsFactory::new();
    }
}
