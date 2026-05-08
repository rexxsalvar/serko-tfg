@props(['name', 'target' => null, 'endpoint' => null])

<input type="hidden" name="{{ $name }}" id="{{ $target ? ltrim($target, '#') : $name.'-input' }}" value="{{ old($name, $attributes->get('value')) }}">
<div
    data-dropzone
    data-target="{{ $target ?? '#'.$name.'-input' }}"
    data-endpoint="{{ $endpoint ?? route('admin.media.store') }}"
    {{ $attributes->merge(['class' => 'dropzone rounded-3xl border-2 border-dashed border-white/20 bg-black/25 p-6 text-sm text-gray-400']) }}
>
    {{ $slot->isEmpty() ? __('serko.admin.drag_drop') : $slot }}
</div>
