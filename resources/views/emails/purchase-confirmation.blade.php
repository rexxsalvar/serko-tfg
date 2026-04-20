<h1>{{ __('serko.mail.purchase_heading') }}</h1>
<p>{{ __('serko.mail.purchase_intro', ['order' => $order->id]) }}</p>
<ul>
    @foreach ($order->tickets as $ticket)
        <li>{{ $ticket->event->homeTeam->name }} vs {{ $ticket->event->awayTeam->name }} - {{ $ticket->seat->row }}{{ $ticket->seat->number }}</li>
    @endforeach
</ul>
