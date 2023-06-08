<?php

namespace Modules\Podcasts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PodcastComments extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function commentable()
    {
        return $this->morphTo();
    }
}
