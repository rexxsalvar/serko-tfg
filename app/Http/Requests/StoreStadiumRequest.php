<?php

namespace App\Http\Requests;

use App\Models\Stadium;
use Illuminate\Foundation\Http\FormRequest;

class StoreStadiumRequest extends FormRequest
{
    public function authorize(): bool
    {
        $stadium = $this->route('stadium');

        return $stadium instanceof Stadium
            ? ($this->user()?->can('update', $stadium) ?? false)
            : ($this->user()?->can('create', Stadium::class) ?? false);
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
