@props(['variant' => 'primary'])

<button {{ $attributes->merge(['class' => $variant === 'secondary' ? 'serko-button-secondary' : 'serko-button']) }}>
    {{ $slot }}
</button>
