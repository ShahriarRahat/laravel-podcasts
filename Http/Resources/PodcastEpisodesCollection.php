<?php
namespace Modules\Podcasts\Http\Resources;
use Modules\Podcasts\Entities\PodcastEpisodes;
use Modules\Podcasts\Traits\PodcastsHelperTraits;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Podcasts\Http\Resources\PodcastsCollection;

class PodcastEpisodesCollection extends ResourceCollection
{
    use PodcastsHelperTraits;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'episode_number' => $item->episode_number,
                'podcast_id' => $item->podcast_id,
                // 'podcast' => new PodcastsCollection([$item->podcast]),
                'image' => @$item->image,
                'audio' => @$item->audio_url,
                'duration' => @$item->duration,
                'release_date' => @$item->release_date,
                'likes_count' => $item->likes_count,
                'comments_count' => $item->comments_count,
                'views_count' => $item->views_count,
                'shares_count' => $item->shares_count,
                'downloads_count' => $item->downloads_count,
                'followers_count' => $item->followers_count,
                'download' => $item->can_download==1 ?  route('apiPodcastDownloader', $item->id): null,
                'user_liked' => $this->userLikedPodcastOrNot(PodcastEpisodes::class, $item->id)
            ];
        });
    }
}
