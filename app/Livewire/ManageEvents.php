<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class ManageEvents extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function delete(int $eventId): void
    {
        Event::query()->findOrFail($eventId)->delete();
    }

    public function render()
    {
        return view('livewire.manage-events', [
            'events' => Event::query()
                ->with(['homeTeam', 'awayTeam', 'stadium'])
                ->when($this->search !== '', function ($query): void {
                    $query->whereHas('homeTeam', fn ($teamQuery) => $teamQuery->where('name', 'like', "%{$this->search}%"))
                        ->orWhereHas('awayTeam', fn ($teamQuery) => $teamQuery->where('name', 'like', "%{$this->search}%"))
                        ->orWhereHas('stadium', fn ($stadiumQuery) => $stadiumQuery->where('name', 'like', "%{$this->search}%"));
                })
                ->latest('date')
                ->paginate(8),
        ]);
    }
}
