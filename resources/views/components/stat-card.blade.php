@props(['label', 'value'])

<div {{ $attributes->merge(['class' => 'serko-metric']) }}>
    <p class="text-sm text-gray-400">{{ $label }}</p>
    <p class="font-display mt-2 text-3xl font-black text-white">{{ $value }}</p>
</div>
