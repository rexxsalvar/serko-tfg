@props(['name'])

<select
    name="{{ $name }}"
    {{ $attributes->merge(['class' => 'serko-input']) }}
>
    {{ $slot }}
</select>
