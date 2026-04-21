<!doctype html>
<html lang="en">
<body>
    <h1>SERKO Sales Summary</h1>
    <p>Order #{{ $order->id }}</p>
    <p>User: {{ $order->user?->email }}</p>
    <p>Tickets: {{ $order->tickets->count() }}</p>
    <p>Total: {{ number_format($order->total_price, 2) }} EUR</p>
</body>
</html>
