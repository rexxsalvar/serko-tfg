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

    <div class="serko-seat-stage">{{ __('serko.orders.pitch') }}</div>

    <div class="flex flex-wrap gap-2 text-xs font-bold text-slate-600">
        <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2"><span class="h-3 w-3 rounded-full bg-white ring-1 ring-slate-300"></span>{{ __('serko.orders.available') }}</span>
        <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2"><span class="h-3 w-3 rounded-full bg-red-600"></span>{{ __('serko.orders.selected') }}</span>
        <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2"><span class="h-3 w-3 rounded-full bg-slate-300"></span>{{ __('serko.orders.sold') }} / {{ __('serko.orders.reserved') }}</span>
    </div>

    @foreach ($selected as $seatId)
        <input type="hidden" name="seat_ids[]" value="{{ $seatId }}">
    @endforeach

    @foreach ($seats as $sectorName => $sectorSeats)
        <div class="space-y-3">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-red-700">{{ $sectorName }}</p>
            </div>
            <div class="grid grid-cols-2 gap-3 md:grid-cols-4 xl:grid-cols-5">
                @foreach ($sectorSeats as $seat)
                    <button
                        type="button"
                        wire:click="toggle({{ $seat->id }})"
                        class="rounded-2xl border px-4 py-3 text-left shadow-sm transition {{ in_array($seat->id, $selected, true) ? 'border-red-600 bg-red-600 text-white shadow-red-900/20' : ($seat->pivot->status !== 'available' ? 'cursor-not-allowed border-slate-200 bg-slate-100 text-slate-400 shadow-none' : 'border-slate-200 bg-white hover:-translate-y-0.5 hover:border-red-300 hover:shadow-red-900/10') }}"
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
