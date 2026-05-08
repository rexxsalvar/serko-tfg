@props(['type' => 'text', 'name'])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    {{ $attributes->merge(['class' => 'serko-input']) }}
    value="{{ old($name, $attributes->get('value')) }}"
>
