@props(['name'])

<label class="inline-flex items-center gap-3 text-sm text-gray-300">
    <input type="checkbox" name="{{ $name }}" value="1" {{ $attributes->class('h-4 w-4 rounded border-white/10 bg-[#0b0f19] text-red-600 focus:ring-red-500') }}>
    <span>{{ $slot }}</span>
</label>
