<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStadiumRequest;
use App\Models\Stadium;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StadiumController extends Controller
{
    public function index(): View
    {
        $stadiums = Stadium::query()->withCount(['events', 'sectors'])->paginate(15);

        return view('admin.stadiums.index', compact('stadiums'));
    }

    public function create(): View
    {
        return view('admin.stadiums.form', ['stadium' => new Stadium()]);
    }

    public function store(StoreStadiumRequest $request): RedirectResponse
    {
        Stadium::query()->create($request->validated());

        return redirect()->route('admin.stadiums.index')->with('status', __('serko.stadiums.created'));
    }

    public function show(Stadium $stadium): View
    {
        $stadium->load('sectors.seats', 'events.homeTeam', 'events.awayTeam');

        return view('admin.stadiums.show', compact('stadium'));
    }

    public function edit(Stadium $stadium): View
    {
        return view('admin.stadiums.form', compact('stadium'));
    }

    public function update(StoreStadiumRequest $request, Stadium $stadium): RedirectResponse
    {
        $stadium->update($request->validated());

        return redirect()->route('admin.stadiums.index')->with('status', __('serko.stadiums.updated'));
    }

    public function destroy(Stadium $stadium): RedirectResponse
    {
        $stadium->delete();

        return back()->with('status', __('serko.stadiums.deleted'));
    }
}
