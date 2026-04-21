<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StadiumResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'capacity' => $this->capacity,
            'image_url' => $this->image ? asset('storage/'.$this->image) : null,
            'events_count' => $this->whenCounted('events'),
            'sectors_count' => $this->whenCounted('sectors'),
            'sectors' => SectorResource::collection($this->whenLoaded('sectors')),
            'events' => EventResource::collection($this->whenLoaded('events')),
        ];
    }
}
