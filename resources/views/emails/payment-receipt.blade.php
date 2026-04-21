<h1>{{ __('serko.mail.payment_receipt_heading') }}</h1>
<p>{{ __('serko.orders.order') }} #{{ $payment->order_id }}</p>
<p>{{ __('serko.orders.total') }}: {{ number_format($payment->order->total_price, 2) }} EUR</p>
<p>Transaction: {{ $payment->transaction_id }}</p>
