@props(['type' => 'info'])

@php
    $classes = [
        'success' => 'border-emerald-500/30 bg-emerald-500/10 text-emerald-200',
        'error' => 'border-red-500/30 bg-red-500/10 text-red-200',
        'info' => 'border-white/10 bg-white/5 text-gray-200',
    ][$type] ?? 'border-white/10 bg-white/5 text-gray-200';
@endphp

<div {{ $attributes->merge(['class' => 'rounded-2xl border px-4 py-3 text-sm '.$classes]) }}>
    {{ $slot }}
</div>
