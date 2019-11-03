<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
           'title' => $this->title,
           'slug' => $this->slug,
           'path' => $this->path,
           'replies' => ReplyResource::collection($this->replies),
           'reply_count' => $this->replies->count(),
           'body' => $this->body,
           'created_at' => $this->created_at->diffForHumans(),
           'user' => $this->user->name,
           'user_id' => $this->user_id,
       ];
    }
}
