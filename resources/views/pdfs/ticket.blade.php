<!DOCTYPE html>
<html>
    <body style="font-family: DejaVu Sans, sans-serif;">
        <h1>SERKO Ticket</h1>
        @foreach ($order->tickets as $ticket)
            <div style="margin-bottom: 24px; border: 1px solid #ddd; padding: 16px;">
                <h2>{{ $ticket->event->homeTeam->name }} vs {{ $ticket->event->awayTeam->name }}</h2>
                <p>{{ $ticket->seat->row }}-{{ $ticket->seat->number }} | {{ number_format($ticket->price, 2) }} EUR</p>
            </div>
        @endforeach
    </body>
</html>
