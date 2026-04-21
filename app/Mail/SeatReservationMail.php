<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\Seat;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SeatReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Event $event,
        public Seat $seat,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: __('serko.mail.seat_reserved_subject'));
    }

    public function content(): Content
    {
        return new Content(view: 'emails.seat-reservation');
    }
}
