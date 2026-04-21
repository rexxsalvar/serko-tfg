<?php

namespace App\Http\Requests;

use App\Models\Competition;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompetitionRequest extends FormRequest
{
    public function authorize(): bool
    {
        $competition = $this->route('competition');

        return $competition instanceof Competition
            ? ($this->user()?->can('update', $competition) ?? false)
            : ($this->user()?->can('create', Competition::class) ?? false);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
