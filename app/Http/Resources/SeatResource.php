<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'row' => $this->row,
            'number' => $this->number,
            'sector' => new SectorResource($this->whenLoaded('sector')),
            'event_price' => $this->pivot?->price,
            'event_status' => $this->pivot?->status,
        ];
    }
}
