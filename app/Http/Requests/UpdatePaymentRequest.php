<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        $payment = $this->route('payment');

        return $payment instanceof Payment
            ? ($this->user()?->can('update', $payment) ?? false)
            : false;
    }

    public function rules(): array
    {
        return [
            'method' => ['sometimes', 'string', 'max:80'],
            'status' => ['sometimes', Rule::in(['pending', 'completed', 'paid', 'captured', 'failed', 'refunded'])],
            'transaction_id' => ['nullable', 'string', 'max:255'],
        ];
    }
}
