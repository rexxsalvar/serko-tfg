<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'created_at' => $this->created_at?->toIso8601String(),
            'payment' => new PaymentResource($this->whenLoaded('payment')),
            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
        ];
    }
}
