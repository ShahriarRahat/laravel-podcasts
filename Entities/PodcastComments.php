<?php

namespace Modules\Podcasts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Scope;

class PodcastComments extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function commentable()
    {
        return $this->morphTo();
    }

}
