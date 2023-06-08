<?php
namespace Modules\Podcasts\Http\Resources;
use Modules\Podcasts\Traits\PodcastsHelperTraits;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Podcasts\Http\Resources\PodcastsCollection;

class FavoritePodcastsCollection extends ResourceCollection
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
                'user' => $item->user->name,
                'podcast' => new PodcastsCollection($item->podcast)
            ];
        });
    }
}
