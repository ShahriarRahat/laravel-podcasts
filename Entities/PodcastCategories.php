<?php

namespace Modules\Podcasts\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Podcasts\Entities\PodcastLikes;
use Modules\Podcasts\Entities\PodcastComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PodcastCategories extends Model
{
    use HasFactory;

    // protected static function newFactory()
    // {
    //     return \Modules\Podcasts\Database\factories\PodcastCategoriesFactory::new();
    // }

    public function podcasts()
    {
        return $this->hasMany(Podcast::class, 'category_id', 'id');
    }

    public function likes(){
        return $this->morphMany(PodcastLikes::class, 'likeable');
    }
    public function comments(){
        return $this->morphMany(PodcastComments::class, 'commentable');
    }
}
