<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscusssionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'entry_id' => $this->entry_id,
            'user_id' => $this->user_id,
            'user_name' => $this->userRelation->name,
            'message' => $this->message,
            'created_at' => $this->created_at,
        ];
    }
}
