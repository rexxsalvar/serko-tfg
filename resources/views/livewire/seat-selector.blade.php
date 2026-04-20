@php
    $selectedSeats = $event->seats->whereIn('id', $selected);
    $total = number_format($selectedSeats->sum(fn ($seat) => $seat->pivot->price), 2, '.', '');
@endphp

<div id="seat-selector-form" class="space-y-6">
    <div class="rounded-3xl bg-slate-100 p-5" data-seat-total="{{ $total }}">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">{{ __('serko.orders.selected') }}</p>
                <p class="mt-1 text-2xl font-black">{{ count($selected) }}</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-slate-500">{{ __('serko.orders.total') }}</p>
                <p class="mt-1 text-2xl font-black">{{ $total }} EUR</p>
            </div>
        </div>
    </div>

    @foreach ($selected as $seatId)
        <input type="hidden" name="seat_ids[]" value="{{ $seatId }}">
    @endforeach

    @foreach ($seats as $sectorName => $sectorSeats)
        <div class="space-y-3">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-red-700">{{ $sectorName }}</p>
            </div>
            <div class="grid grid-cols-2 gap-3 md:grid-cols-4">
                @foreach ($sectorSeats as $seat)
                    <button
                        type="button"
                        wire:click="toggle({{ $seat->id }})"
                        class="rounded-2xl border px-4 py-3 text-left transition {{ in_array($seat->id, $selected, true) ? 'border-red-600 bg-red-600 text-white' : ($seat->pivot->status !== 'available' ? 'cursor-not-allowed border-slate-200 bg-slate-100 text-slate-400' : 'border-slate-200 bg-white hover:border-red-300') }}"
                        @disabled($seat->pivot->status !== 'available')
                    >
                        <span class="block text-sm font-semibold">{{ $seat->row }}-{{ $seat->number }}</span>
                        <span class="mt-1 block text-xs">{{ number_format($seat->pivot->price, 2) }} EUR</span>
                    </button>
                @endforeach
            </div>
        </div>
    @endforeach

    <script>
        document.dispatchEvent(new CustomEvent('seat-selector-updated'));
    </script>
</div>
