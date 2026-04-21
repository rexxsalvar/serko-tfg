<!doctype html>
<html lang="en">
<body>
    <h1>SERKO Payment Receipt</h1>
    <p>Order #{{ $order->id }}</p>
    <p>Total: {{ number_format($order->total_price, 2) }} EUR</p>
    <p>Status: {{ $order->payment?->status ?? $order->status }}</p>
</body>
</html>
