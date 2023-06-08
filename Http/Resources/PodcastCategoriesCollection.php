<?php
namespace Modules\Podcasts\Http\Resources;
use Modules\Podcasts\Entities\PodcastComments;
use Modules\Podcasts\Traits\PodcastsHelperTraits;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PodcastCategoriesCollection extends ResourceCollection
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
                'image' => @$item->image,
                'likes_count' => $item->likes_count,
                'comments_count' => $item->comments_count,
                'views_count' => $item->views_count,
                'shares_count' => $item->shares_count,
                'followers_count' => $item->followers_count,
                'user_liked' => $this->userLikedPodcastOrNot(PodcastComments::class, $item->id)
            ];
        });
    }
}
