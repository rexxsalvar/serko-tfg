<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStadiumRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasRole('Admin') ?? false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'integer', 'min:1'],
            'image' => ['nullable', 'string', 'max:2048'],
        ];
    }
}
