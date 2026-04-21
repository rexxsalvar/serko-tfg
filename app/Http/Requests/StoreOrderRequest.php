<?php

namespace App\Http\Requests;

use App\Rules\AvailableEventSeats;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'event_id' => ['required', 'exists:events,id'],
            'seat_ids' => ['required', 'array', 'min:1', new AvailableEventSeats($this->integer('event_id'))],
            'seat_ids.*' => ['integer', 'distinct', 'exists:seats,id'],
            'payment_method' => ['required', 'in:paypal'],
            'paypal_order_id' => ['required', 'string'],
        ];
    }
}
