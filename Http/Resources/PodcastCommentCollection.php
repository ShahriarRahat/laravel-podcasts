<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function($item){
            return[
                'id' => $item->id,
                'commentable_type' => $item->commentable_type,
                'commentable_id' => $item->commentable_id,
                'user_id' => $item->user_id,
                'email' => @$item->user->email,
                'name' => $item->user->name,
                'thumbnail' => url(@$item->user->image->path),
                'content' => $item->content,
                'comment_id' => $item->comment_id,
                'edited' => $item->edited,
                'deleted' => $item->deleted,
                'replies' => $item->replies?$item->replies->count():0,
                'date' => $item->created_at->format('U'),
                'type' => $item->type,
                'created_at' => $item->created_at,
                'updated_at' => $item->created_at,

                // For Multiple Comment With Replies
                // 'replies' => new CommentCollection($item->replies()->get()),
            ];
        });
    }
}
