<?php

namespace App\Http\Requests;

use App\Models\Sector;
use Illuminate\Foundation\Http\FormRequest;

class StoreSectorRequest extends FormRequest
{
    public function authorize(): bool
    {
        $sector = $this->route('sector');

        return $sector instanceof Sector
            ? ($this->user()?->can('update', $sector) ?? false)
            : ($this->user()?->can('create', Sector::class) ?? false);
    }

    public function rules(): array
    {
        return [
            'stadium_id' => ['required', 'exists:stadiums,id'],
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:80'],
        ];
    }
}
