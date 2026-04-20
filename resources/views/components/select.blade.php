@props(['name'])

<select
    name="{{ $name }}"
    {{ $attributes->merge(['class' => 'w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-red-500 focus:ring-2 focus:ring-red-100']) }}
>
    {{ $slot }}
</select>
