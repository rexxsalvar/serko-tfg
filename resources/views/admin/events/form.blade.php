@extends('layouts.app')

@section('content')
    <section class="serko-card px-8 py-8">
        <h1 class="text-3xl font-black">{{ $event->exists ? __('serko.admin.edit_event') : __('serko.admin.new_event') }}</h1>

        <form method="POST" action="{{ $event->exists ? route('admin.events.update', $event) : route('admin.events.store') }}" class="mt-6 space-y-5">
            @csrf
            @if($event->exists)
                @method('PUT')
            @endif

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <x-label :value="__('serko.events.stadium')" />
                    <x-select name="stadium_id">
                        @foreach ($stadiums as $stadium)
                            <option value="{{ $stadium->id }}" @selected(old('stadium_id', $event->stadium_id) == $stadium->id)>{{ $stadium->name }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div>
                    <x-label :value="__('serko.events.competition')" />
                    <x-select name="competition_id">
                        @foreach ($competitions as $competition)
                            <option value="{{ $competition->id }}" @selected(old('competition_id', $event->competition_id) == $competition->id)>{{ $competition->name }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div>
                    <x-label value="Home Team" />
                    <x-select name="home_team_id">
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}" @selected(old('home_team_id', $event->home_team_id) == $team->id)>{{ $team->name }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div>
                    <x-label value="Away Team" />
                    <x-select name="away_team_id">
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}" @selected(old('away_team_id', $event->away_team_id) == $team->id)>{{ $team->name }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="md:col-span-2">
                    <x-label :value="__('serko.events.date')" />
                    <x-datepicker name="date" :value="old('date', optional($event->date)->format('Y-m-d\TH:i'))" />
                </div>
                <div class="md:col-span-2">
                    <x-label :value="__('serko.events.description')" />
                    <input type="hidden" name="description" id="description-input" value="{{ old('description', $event->description) }}">
                    <div data-wysiwyg data-target="#description-input" class="rounded-2xl bg-white"></div>
                </div>
            </div>

            <div>
                <x-label value="Seat catalogue" />
                <div class="grid gap-4 md:grid-cols-2">
                    @foreach ($seatCatalogue as $stadiumName => $seats)
                        <div class="rounded-3xl bg-slate-100 p-4">
                            <p class="mb-3 font-semibold">{{ $stadiumName }}</p>
                            <div class="grid gap-3">
                                @foreach ($seats->take(8) as $seat)
                                    <div class="grid grid-cols-[1fr_120px_130px] gap-3">
                                        <div class="rounded-2xl bg-white px-3 py-2 text-sm">{{ $seat->sector->name }} / {{ $seat->row }}-{{ $seat->number }}</div>
                                        <x-input type="number" step="0.01" name="seats[{{ $loop->parent->index }}{{ $loop->index }}][price]" value="45.00" />
                                        <input type="hidden" name="seats[{{ $loop->parent->index }}{{ $loop->index }}][seat_id]" value="{{ $seat->id }}">
                                        <x-select name="seats[{{ $loop->parent->index }}{{ $loop->index }}][status]">
                                            <option value="available">available</option>
                                            <option value="reserved">reserved</option>
                                            <option value="sold">sold</option>
                                        </x-select>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="serko-button">{{ __('serko.admin.save') }}</button>
        </form>
    </section>
@endsection
