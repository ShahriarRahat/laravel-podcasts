<?php

namespace Modules\Podcasts\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\RespondsWithHttpStatus;
use Modules\Podcasts\Entities\Podcast;
use Illuminate\Contracts\Support\Renderable;
use Modules\Podcasts\Entities\PodcastEpisodes;
use Modules\Podcasts\Entities\FavoritePodcasts;
use Modules\Podcasts\Entities\PodcastCategories;
use Modules\Podcasts\Http\Resources\PodcastsCollection;
use Modules\Podcasts\Http\Resources\PodcastEpisodesCollection;
use Modules\Podcasts\Http\Resources\PodcastCategoriesCollection;

class PodcastsController extends Controller
{
    use RespondsWithHttpStatus;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $podcasts = Podcast::query();
        if ($request->sort_order == 'asc') {
            $podcasts = $podcasts->orderBy('id', 'asc');
        } else {
            $podcasts = $podcasts->orderBy('id', 'desc');
        }
        if($request->user_id != null){
            $podcasts = $podcasts->where('user_id', $request->user_id);
        }
        if ($request->keyword) {
            $podcasts = $podcasts->where('title', 'like', '%' . $request->keyword . '%');
        }
        if ($request->category_id) {
            $podcasts = $podcasts->where('category_id', 'like', '%' . $request->category_id . '%');
        }

        $podcasts = $podcasts->paginate(10);

        return $this->respondWithSuccess('Podcasts', new PodcastsCollection($podcasts));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('podcasts::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('podcasts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('podcasts::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function categories(Request $request)
    {
        $podcastCategories = PodcastCategories::query();
        if ($request->sort_order == 'asc') {
            $podcastCategories = $podcastCategories->orderBy('id', 'asc');
        } else {
            $podcastCategories = $podcastCategories->orderBy('id', 'desc');
        }
        if ($request->keyword) {
            $podcastCategories = $podcastCategories->where('title', 'like', '%' . $request->keyword . '%');
        }

        $podcastCategories = $podcastCategories->paginate(10);

        return $this->respondWithSuccess('Podcast Categories', new PodcastCategoriesCollection($podcastCategories));

    }

    public function episodes(Request $request)
    {
        $podcastEpisodes = PodcastEpisodes::query();
        if ($request->sort_order == 'asc') {
            $podcastEpisodes = $podcastEpisodes->orderBy('id', 'asc');
        } else {
            $podcastEpisodes = $podcastEpisodes->orderBy('id', 'desc');
        }
        if ($request->keyword) {
            $podcastEpisodes = $podcastEpisodes->where('title', 'like', '%' . $request->keyword . '%');
        }
        if ($request->podcast_id) {
            $podcastEpisodes = $podcastEpisodes->where('podcast_id', 'like', '%' . $request->podcast_id . '%');
        }

        $podcastEpisodes = $podcastEpisodes->paginate(10);

        return $this->respondWithSuccess('Podcast Categories', new PodcastEpisodesCollection($podcastEpisodes));

    }

    public function favorites(Request $request)
    {
        if(!Auth::check()){
            return $this->respondWithError('Unauthorized', 401);
        }else{
            $favoritePodcasts = FavoritePodcasts::query();
            if ($request->sort_order == 'asc') {
                $favoritePodcasts = $favoritePodcasts->orderBy('id', 'asc');
            } else {
                $favoritePodcasts = $favoritePodcasts->orderBy('id', 'desc');
            }
            $favoritePodcasts = $favoritePodcasts->where('user_id', Auth::id());

            $favoritePodcasts = $favoritePodcasts->paginate(10);

            return $this->respondWithSuccess('Podcast Categories', new PodcastEpisodesCollection($favoritePodcasts));
        }

    }
}
