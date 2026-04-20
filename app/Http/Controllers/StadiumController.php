<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use Illuminate\Contracts\View\View;

class StadiumController extends Controller
{
    public function index(): View
    {
        $stadiums = Stadium::query()->withCount(['events', 'sectors'])->paginate(9);

        return view('stadiums.index', compact('stadiums'));
    }

    public function show(Stadium $stadium): View
    {
        $stadium->load(['sectors.seats', 'events.homeTeam', 'events.awayTeam']);

        return view('stadiums.show', compact('stadium'));
    }
}
