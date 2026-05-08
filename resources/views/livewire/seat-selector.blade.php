@php
    $selectedSeats = $event->seats->whereIn('id', $selected);
    $total = number_format($selectedSeats->sum(fn ($seat) => $seat->pivot->price), 2, '.', '');
@endphp

<div id="seat-selector-form" class="space-y-7">
    <div class="grid gap-4 md:grid-cols-[1fr_auto] md:items-center">
        <div>
            <h2 class="font-display text-3xl font-black text-white">{{ __('serko.orders.checkout_title') }}</h2>
            <p class="mt-2 text-sm text-gray-400">Selecciona uno o varios asientos disponibles. SERKO validara de nuevo antes de emitir tus QR.</p>
        </div>
        <div class="rounded-3xl border border-white/10 bg-black/30 p-5 text-right" data-seat-total="{{ $total }}">
            <p class="text-sm text-gray-400">{{ __('serko.orders.selected') }}: <span class="font-black text-white">{{ count($selected) }}</span></p>
            <p class="font-display mt-1 text-3xl font-black text-[#fcbf49]">{{ $total }} EUR</p>
        </div>
    </div>

    <div class="serko-seat-stage">{{ __('serko.orders.pitch') }}</div>

    <div class="flex flex-wrap gap-2 text-xs font-bold text-gray-300">
        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-2"><span class="h-3 w-3 rounded-full bg-white/70"></span>{{ __('serko.orders.available') }}</span>
        <span class="inline-flex items-center gap-2 rounded-full border border-red-500/30 bg-red-500/10 px-3 py-2"><span class="h-3 w-3 rounded-full bg-red-600"></span>{{ __('serko.orders.selected') }}</span>
        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-2"><span class="h-3 w-3 rounded-full bg-gray-700"></span>{{ __('serko.orders.sold') }} / {{ __('serko.orders.reserved') }}</span>
    </div>

    @foreach ($selected as $seatId)
        <input type="hidden" name="seat_ids[]" value="{{ $seatId }}">
    @endforeach

    @foreach ($seats as $sectorName => $sectorSeats)
        <div class="space-y-4 rounded-3xl border border-white/10 bg-black/20 p-5">
            <div class="flex items-center justify-between gap-4">
                <p class="serko-kicker">{{ $sectorName }}</p>
                <p class="text-xs font-bold text-gray-500">{{ $sectorSeats->where('pivot.status', 'available')->count() }} {{ __('serko.orders.available') }}</p>
            </div>
            <div class="grid grid-cols-3 gap-2 sm:grid-cols-5 md:grid-cols-6 xl:grid-cols-8">
                @foreach ($sectorSeats as $seat)
                    <button
                        type="button"
                        wire:click="toggle({{ $seat->id }})"
                        class="seat rounded-xl border px-3 py-3 text-left text-sm shadow-sm transition {{ in_array($seat->id, $selected, true) ? 'selected serko-status-selected' : ($seat->pivot->status !== 'available' ? 'sold reserved serko-status-blocked' : 'serko-status-available') }}"
                        @disabled($seat->pivot->status !== 'available')
                    >
                        <span class="block font-black">{{ $seat->row }}-{{ $seat->number }}</span>
                        <span class="mt-1 block text-[11px] opacity-75">{{ number_format($seat->pivot->price, 2) }} EUR</span>
                    </button>
                @endforeach
            </div>
        </div>
    @endforeach

    <script>
        document.dispatchEvent(new CustomEvent('seat-selector-updated'));
    </script>
</div>
