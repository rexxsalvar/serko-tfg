@extends('layouts.app')

@section('content')
    <section class="grid gap-6 lg:grid-cols-[1.15fr_0.85fr]">
        <form id="checkout-form" method="POST" action="{{ route('orders.store') }}" class="serko-card px-8 py-8">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <input type="hidden" id="paypal_order_id" name="paypal_order_id" value="{{ old('paypal_order_id') }}">
            <input type="hidden" name="payment_method" value="paypal">

            <div class="mb-6">
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-red-700">{{ __('serko.orders.checkout_title') }}</p>
                <h1 class="mt-2 text-4xl font-black">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</h1>
                <p class="mt-3 text-slate-600">{{ $event->date->format('d/m/Y H:i') }} - {{ $event->stadium->name }}</p>
            </div>

            @error('seat_ids')
                <div class="mb-4 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">{{ $message }}</div>
            @enderror

            <livewire:seat-selector :event="$event" />
        </form>

        <aside class="serko-card px-6 py-6">
            <h2 class="text-2xl font-bold">{{ __('serko.orders.payment_title') }}</h2>
            <p class="mt-3 text-sm text-slate-600">{{ __('serko.orders.payment_help') }}</p>
            <div class="mt-6 rounded-3xl bg-slate-100 p-4">
                <p class="text-sm text-slate-500">{{ __('serko.orders.total') }}</p>
                <p id="checkout-total" class="mt-2 text-3xl font-black">0.00 EUR</p>
            </div>
            <div id="paypal-button-container" class="mt-6"></div>
            <button id="submit-order" type="submit" form="checkout-form" class="serko-button mt-4 hidden w-full">
                {{ __('serko.orders.complete') }}
            </button>
        </aside>
    </section>
@endsection

@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id', 'test') }}&currency=EUR"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('paypal-button-container');
            const submitButton = document.getElementById('submit-order');
            const paypalOrderInput = document.getElementById('paypal_order_id');

            const syncTotal = () => {
                const total = document.querySelector('[data-seat-total]')?.dataset.seatTotal ?? '0.00';
                document.getElementById('checkout-total').textContent = `${total} EUR`;
                return total;
            };

            document.addEventListener('seat-selector-updated', syncTotal);
            syncTotal();

            if (!window.paypal || !container) {
                submitButton.classList.remove('hidden');
                paypalOrderInput.value = 'manual-paypal-order';
                return;
            }

            window.paypal.Buttons({
                createOrder(data, actions) {
                    const total = syncTotal();

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: total,
                            },
                        }],
                    });
                },
                onApprove(data) {
                    paypalOrderInput.value = data.orderID;
                    submitButton.classList.remove('hidden');
                    submitButton.click();
                },
            }).render('#paypal-button-container');
        });
    </script>
@endpush
