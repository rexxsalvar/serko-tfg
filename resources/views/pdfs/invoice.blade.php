<!DOCTYPE html>
<html>
    <body style="font-family: DejaVu Sans, sans-serif;">
        <h1>SERKO Invoice #{{ $order->id }}</h1>
        <p>{{ $order->user->name }} - {{ $order->user->email }}</p>
        <table width="100%" cellpadding="8" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th>Match</th>
                    <th>Seat</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->event->homeTeam->name }} vs {{ $ticket->event->awayTeam->name }}</td>
                        <td>{{ $ticket->seat->row }}-{{ $ticket->seat->number }}</td>
                        <td>{{ number_format($ticket->price, 2) }} EUR</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total: {{ number_format($order->total_price, 2) }} EUR</p>
    </body>
</html>
