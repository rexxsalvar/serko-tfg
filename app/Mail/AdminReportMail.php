<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $type,
        public string $path,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: __('serko.mail.admin_report_subject', ['type' => $this->type]));
    }

    public function content(): Content
    {
        return new Content(view: 'emails.admin-report');
    }
}
