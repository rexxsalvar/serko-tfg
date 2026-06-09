<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public const SUPPORTED = ['es', 'en'];

    public function switch(string $locale): RedirectResponse
    {
        abort_unless(in_array($locale, self::SUPPORTED, true), 404);

        session(['locale' => $locale]);

        return back();
    }
}
