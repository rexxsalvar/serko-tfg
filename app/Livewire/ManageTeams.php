<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class ManageTeams extends Component
{
    use WithPagination;

    public string $search = '';

    public string $name = '';

    public string $logo = '';

    public ?int $editingId = null;

    public function save(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'string', 'max:2048'],
        ]);

        Team::query()->updateOrCreate(['id' => $this->editingId], $validated);

        $this->reset(['name', 'logo', 'editingId']);
    }

    public function edit(int $teamId): void
    {
        $team = Team::query()->findOrFail($teamId);
        $this->editingId = $team->id;
        $this->name = $team->name;
        $this->logo = $team->logo ?? '';
    }

    public function delete(int $teamId): void
    {
        Team::query()->findOrFail($teamId)->delete();
    }

    public function render()
    {
        return view('livewire.manage-teams', [
            'teams' => Team::query()->searchName($this->search)->paginate(8),
        ]);
    }
}
