@props(['name', 'target' => null])

@php($inputId = $target ? ltrim($target, '#') : $name.'-wysiwyg-input')

<input type="hidden" name="{{ $name }}" id="{{ $inputId }}" value="{{ old($name, $attributes->get('value')) }}">
<div data-wysiwyg data-target="#{{ $inputId }}" {{ $attributes->merge(['class' => 'rounded-2xl bg-white text-slate-900']) }}></div>
