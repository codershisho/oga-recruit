<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EntryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "full_name" => $this->first_name . ' ' . $this->last_name,
            "first_name_kana" => $this->first_name_kana,
            "last_name_kana" => $this->last_name_kana,
            "phase_id" => $this->phase_id,
            "phase_name" => $this->phaseRelation->name,
            "status_id" => $this->status_id,
            "status_name" => $this->statusRelation->name,
            "mail" => $this->mail,
            "birth_day" => $this->birth_day,
            "post_code" => $this->post_code,
            "address" => $this->address,
            "phone" => $this->phone,
            "positions" => $this->positions,
            "final_position" => $this->final_position,
            "join_day" => $this->join_day,
            "source_id" => $this->source_id,
            "source_name" => $this->sourceRelation->name,
            "free_message" => $this->free_message,
            "image" => $this->image,
            "created_at" => $this->created_at->format('Y-m-d H:i:s'),
            "updated_at" => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
