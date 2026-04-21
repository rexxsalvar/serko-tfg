<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'qr_code' => $this->qr_code,
            'event' => new EventResource($this->whenLoaded('event')),
            'seat' => new SeatResource($this->whenLoaded('seat')),
            'order' => new OrderResource($this->whenLoaded('order')),
        ];
    }
}
