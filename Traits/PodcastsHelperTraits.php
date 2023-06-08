<?php
namespace Modules\Podcasts\Traits;

use Illuminate\Support\Facades\Auth;
use Modules\Podcasts\Entities\PodcastLikes;

trait PodcastsHelperTraits
{
    public function userLikedPodcastOrNot($model, $id)
    {
        try {
            $liked = PodcastLikes::where('likeable_type', $model)->where('likeable_id', $id)->where('user_id', Auth::user()->id)->first();
            if ($liked) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
}
