<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date?->toIso8601String(),
            'description' => $this->description,
            'available_seats' => $this->when(isset($this->available_seats_count), $this->available_seats_count),
            'competition' => new CompetitionResource($this->whenLoaded('competition')),
            'stadium' => new StadiumResource($this->whenLoaded('stadium')),
            'home_team' => new TeamResource($this->whenLoaded('homeTeam')),
            'away_team' => new TeamResource($this->whenLoaded('awayTeam')),
            'seats' => SeatResource::collection($this->whenLoaded('seats')),
        ];
    }
}
