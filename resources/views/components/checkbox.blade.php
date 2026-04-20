@props(['name'])

<label class="inline-flex items-center gap-3 text-sm text-slate-700">
    <input type="checkbox" name="{{ $name }}" value="1" {{ $attributes->class('h-4 w-4 rounded border-slate-300 text-red-600 focus:ring-red-500') }}>
    <span>{{ $slot }}</span>
</label>
