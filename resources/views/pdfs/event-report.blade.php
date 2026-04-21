<!doctype html>
<html lang="en">
<body>
    <h1>SERKO Event Report</h1>
    @foreach ($order->tickets->groupBy('event_id') as $eventTickets)
        @php($event = $eventTickets->first()->event)
        <h2>{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</h2>
        <p>{{ $event->date->format('d/m/Y H:i') }}</p>
        <p>Tickets in this order: {{ $eventTickets->count() }}</p>
    @endforeach
</body>
</html>
