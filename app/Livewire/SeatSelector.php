<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class SeatSelector extends Component
{
    public Event $event;

    #[Modelable]
    public array $selected = [];

    public function toggle(int $seatId): void
    {
        if (in_array($seatId, $this->selected, true)) {
            $this->selected = array_values(array_diff($this->selected, [$seatId]));

            return;
        }

        $this->selected[] = $seatId;
    }

    public function render()
    {
        $seats = $this->event->seats()
            ->with('sector')
            ->orderBy('row')
            ->orderBy('number')
            ->get()
            ->groupBy(fn ($seat) => $seat->sector->name);

        return view('livewire.seat-selector', compact('seats'));
    }
}
