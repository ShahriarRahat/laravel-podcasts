<?php

namespace Modules\Podcasts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PodcastLikes extends Model
{
    use HasFactory;

    protected $fillable = [];
    public function likeable()
    {
        return $this->morphTo();
    }
}
