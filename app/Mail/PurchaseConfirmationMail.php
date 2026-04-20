<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PurchaseConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: __('serko.mail.purchase_subject', ['order' => $this->order->id]));
    }

    public function content(): Content
    {
        return new Content(view: 'emails.purchase-confirmation');
    }
}
