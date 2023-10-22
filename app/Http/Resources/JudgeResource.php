<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JudgeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'entry_id' => $this->entry_id,
            'phase_id' => $this->phase_id,
            'phase_name' => $this->phaseRelation->name,
            'next_action_day' => $this->next_action_day,
            'message' => $this->message,
        ];
    }
}
