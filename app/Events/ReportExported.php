<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportExported
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public string $type,
        public string $path,
    ) {}
}
