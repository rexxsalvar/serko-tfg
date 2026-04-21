<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        $event = $this->route('event');

        return $event instanceof Event
            ? ($this->user()?->can('update', $event) ?? false)
            : ($this->user()?->can('create', Event::class) ?? false);
    }

    public function rules(): array
    {
        return [
            'stadium_id' => ['required', 'exists:stadiums,id'],
            'competition_id' => ['required', 'exists:competitions,id'],
            'home_team_id' => ['required', 'different:away_team_id', 'exists:teams,id'],
            'away_team_id' => ['required', 'exists:teams,id'],
            'date' => ['required', 'date', 'after:now'],
            'description' => ['nullable', 'string'],
            'seats' => ['sometimes', 'array'],
            'seats.*.seat_id' => ['required_with:seats', 'exists:seats,id'],
            'seats.*.price' => ['required_with:seats', 'numeric', 'min:0'],
            'seats.*.status' => ['nullable', 'in:available,reserved,sold'],
        ];
    }
}
