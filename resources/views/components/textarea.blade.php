@props(['name'])

<textarea
    name="{{ $name }}"
    {{ $attributes->merge(['class' => 'serko-input']) }}
>{{ old($name, $slot->isEmpty() ? $attributes->get('value') : $slot) }}</textarea>
