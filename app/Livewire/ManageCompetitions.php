<?php

namespace App\Livewire;

use App\Models\Competition;
use Livewire\Component;
use Livewire\WithPagination;

class ManageCompetitions extends Component
{
    use WithPagination;

    public string $name = '';

    public ?int $editingId = null;

    public function save(): void
    {
        $validated = $this->validate(['name' => ['required', 'string', 'max:255']]);

        Competition::query()->updateOrCreate(['id' => $this->editingId], $validated);

        $this->reset(['name', 'editingId']);
    }

    public function edit(int $competitionId): void
    {
        $competition = Competition::query()->findOrFail($competitionId);
        $this->editingId = $competition->id;
        $this->name = $competition->name;
    }

    public function delete(int $competitionId): void
    {
        Competition::query()->findOrFail($competitionId)->delete();
    }

    public function render()
    {
        return view('livewire.manage-competitions', [
            'competitions' => Competition::query()->orderBy('name')->paginate(8),
        ]);
    }
}
