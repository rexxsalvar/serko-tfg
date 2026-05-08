@extends('layouts.app')

@section('content')
    @php($eventSeatMap = $event->seats->keyBy('id'))

    <section class="serko-card px-8 py-8">
        <h1 class="font-display text-3xl font-black text-white">{{ $event->exists ? __('serko.admin.edit_event') : __('serko.admin.new_event') }}</h1>

        <form method="POST" action="{{ $event->exists ? route('admin.events.update', $event) : route('admin.events.store') }}" class="mt-6 space-y-5">
            @csrf
            @if($event->exists)
                @method('PUT')
            @endif

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <x-label :value="__('serko.events.stadium')" />
                    <x-select name="stadium_id" id="event-stadium-select">
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
                    <x-wysiwyg name="description" target="#description-input" :value="$event->description" />
                </div>
            </div>

            <div>
                <x-label value="Seat catalogue" />
                <div class="grid gap-4 md:grid-cols-2">
                    @foreach ($seatCatalogue as $stadiumId => $seats)
                        @php($stadium = $seats->first()->sector->stadium)
                        <div class="rounded-3xl border border-white/10 bg-black/25 p-4" data-seat-catalogue-stadium="{{ $stadiumId }}">
                            <p class="mb-3 font-semibold text-white">{{ $stadium->name }}</p>
                            <div class="grid gap-3">
                                @foreach ($seats as $seat)
                                    @php($inputKey = $seat->id)
                                    @php($pivotSeat = $eventSeatMap->get($seat->id))
                                    @php($defaultPrice = $seat->sector->type === 'vip' ? '145.00' : ($seat->sector->type === 'family' ? '65.00' : '45.00'))
                                    <div class="grid grid-cols-[1fr_120px_130px] gap-3">
                                        <div class="rounded-2xl border border-white/10 bg-white/5 px-3 py-2 text-sm text-gray-300">{{ $seat->sector->name }} / {{ $seat->row }}-{{ $seat->number }}</div>
                                        <x-input type="number" step="0.01" name="seats[{{ $inputKey }}][price]" :value="old('seats.'.$inputKey.'.price', $pivotSeat?->pivot?->price ?? $defaultPrice)" />
                                        <input type="hidden" name="seats[{{ $inputKey }}][seat_id]" value="{{ $seat->id }}">
                                        <x-select name="seats[{{ $inputKey }}][status]">
                                            @foreach (['available', 'reserved', 'sold'] as $status)
                                                <option value="{{ $status }}" @selected(old('seats.'.$inputKey.'.status', $pivotSeat?->pivot?->status ?? 'available') === $status)>{{ $status }}</option>
                                            @endforeach
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const stadiumSelect = document.getElementById('event-stadium-select');
            const blocks = document.querySelectorAll('[data-seat-catalogue-stadium]');

            const syncSeatCatalogue = () => {
                blocks.forEach((block) => {
                    block.classList.toggle('hidden', block.dataset.seatCatalogueStadium !== stadiumSelect.value);
                });
            };

            stadiumSelect?.addEventListener('change', syncSeatCatalogue);
            syncSeatCatalogue();
        });
    </script>
@endpush
