@props(['value'])

<label {{ $attributes->class('mb-2 block text-sm font-semibold text-slate-700') }}>
    {{ $value ?? $slot }}
</label>
