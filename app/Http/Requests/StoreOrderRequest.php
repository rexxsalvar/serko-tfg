<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
            'seat_ids' => ['required', 'array', 'min:1'],
            'seat_ids.*' => ['integer', 'distinct', 'exists:seats,id'],
            'payment_method' => ['required', 'in:paypal'],
            'paypal_order_id' => ['required', 'string'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            $event = Event::query()->find($this->integer('event_id'));

            if (! $event) {
                return;
            }

            $availableSeatIds = $event->seats()
                ->wherePivot('status', 'available')
                ->pluck('seats.id')
                ->all();

            foreach ($this->input('seat_ids', []) as $seatId) {
                if (! in_array((int) $seatId, $availableSeatIds, true)) {
                    $validator->errors()->add('seat_ids', __('serko.validation.seat_unavailable'));
                    break;
                }
            }
        });
    }
}
