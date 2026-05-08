@props(['value'])

<label {{ $attributes->class('serko-label') }}>
    {{ $value ?? $slot }}
</label>
