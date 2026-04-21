@props(['label', 'value'])

<div {{ $attributes->merge(['class' => 'serko-metric']) }}>
    <p class="text-sm text-slate-500">{{ $label }}</p>
    <p class="mt-2 text-3xl font-black text-slate-950">{{ $value }}</p>
</div>
