<?php

namespace App\Livewire;

use App\Models\Sector;
use App\Models\Stadium;
use Livewire\Component;
use Livewire\WithPagination;

class ManageSectors extends Component
{
    use WithPagination;

    public ?int $stadium_id = null;

    public string $name = '';

    public string $type = 'general';

    public ?int $editingId = null;

    public function save(): void
    {
        $validated = $this->validate([
            'stadium_id' => ['required', 'exists:stadiums,id'],
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:80'],
        ]);

        Sector::query()->updateOrCreate(['id' => $this->editingId], $validated);

        $this->reset(['name', 'type', 'editingId']);
        $this->type = 'general';
    }

    public function edit(int $sectorId): void
    {
        $sector = Sector::query()->findOrFail($sectorId);
        $this->editingId = $sector->id;
        $this->stadium_id = $sector->stadium_id;
        $this->name = $sector->name;
        $this->type = $sector->type;
    }

    public function delete(int $sectorId): void
    {
        Sector::query()->findOrFail($sectorId)->delete();
    }

    public function render()
    {
        return view('livewire.manage-sectors', [
            'sectors' => Sector::query()->with('stadium')->paginate(8),
            'stadiums' => Stadium::query()->orderBy('name')->get(),
        ]);
    }
}
