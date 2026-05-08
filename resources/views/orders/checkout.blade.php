@extends('layouts.app')

@section('content')
    <section class="space-y-8">
        <div class="serko-card reveal-element overflow-hidden">
            <div class="grid gap-0 lg:grid-cols-[1fr_24rem]">
                <div class="p-8">
                    <p class="serko-kicker">{{ __('serko.orders.checkout_title') }}</p>
                    <h1 class="font-display mt-3 text-4xl font-black text-white md:text-5xl">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</h1>
                    <p class="mt-4 text-gray-400">{{ $event->date->format('d/m/Y H:i') }} - <span class="text-[#fcbf49]">{{ $event->stadium->name }}</span></p>
                </div>
                <div class="bg-[radial-gradient(circle_at_top,#fcbf49_0%,#d62828_42%,#6a040f_100%)] p-8">
                    <p class="text-sm uppercase tracking-[0.3em] text-white/70">PayPal checkout</p>
                    <p class="font-display mt-5 text-4xl font-black text-white">{{ __('serko.orders.selected') }}</p>
                    <p class="mt-2 text-white/70">{{ __('serko.orders.payment_help') }}</p>
                </div>
            </div>
        </div>

        <section class="grid gap-8 lg:grid-cols-[1fr_24rem]">
            <form id="checkout-form" method="POST" action="{{ route('orders.store') }}" class="serko-card reveal-element p-6 md:p-8">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="hidden" id="paypal_order_id" name="paypal_order_id" value="{{ old('paypal_order_id') }}">
                <input type="hidden" name="payment_method" value="paypal">

                @error('seat_ids')
                    <div class="mb-5 rounded-2xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm font-bold text-red-200">{{ $message }}</div>
                @enderror

                <livewire:seat-selector :event="$event" />
            </form>

            <aside class="serko-card reveal-element h-fit p-6 lg:sticky lg:top-28">
                <h2 class="font-display text-2xl font-black text-white">{{ __('serko.orders.payment_title') }}</h2>
                <p class="mt-3 text-sm leading-6 text-gray-400">{{ __('serko.orders.payment_help') }}</p>

                <div class="mt-6 rounded-3xl border border-white/10 bg-black/30 p-5">
                    <p class="text-sm text-gray-400">{{ __('serko.orders.total') }}</p>
                    <p id="checkout-total" class="font-display mt-2 text-4xl font-black text-[#fcbf49]">0.00 EUR</p>
                </div>

                <div id="paypal-button-container" class="mt-6"></div>
                <button id="submit-order" type="submit" form="checkout-form" class="serko-button mt-4 hidden w-full">
                    {{ __('serko.orders.complete') }}
                </button>
            </aside>
        </section>
    </section>
@endsection

@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id', 'test') }}&currency=EUR"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('paypal-button-container');
            const submitButton = document.getElementById('submit-order');
            const paypalOrderInput = document.getElementById('paypal_order_id');
            const totalElement = document.getElementById('checkout-total');

            const syncTotal = () => {
                const total = document.querySelector('[data-seat-total]')?.dataset.seatTotal ?? '0.00';
                totalElement.textContent = `${total} EUR`;
                totalElement.classList.add('scale-105');
                setTimeout(() => totalElement.classList.remove('scale-105'), 180);
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
