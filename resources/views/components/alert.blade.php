@props(['type' => 'info'])

@php
    $classes = [
        'success' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
        'error' => 'border-red-200 bg-red-50 text-red-700',
        'info' => 'border-slate-200 bg-white text-slate-700',
    ][$type] ?? 'border-slate-200 bg-white text-slate-700';
@endphp

<div {{ $attributes->merge(['class' => 'rounded-2xl border px-4 py-3 text-sm '.$classes]) }}>
    {{ $slot }}
</div>
