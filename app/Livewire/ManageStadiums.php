<?php

namespace App\Livewire;

use App\Models\Stadium;
use Livewire\Component;
use Livewire\WithPagination;

class ManageStadiums extends Component
{
    use WithPagination;

    public string $search = '';

    public function delete(int $stadiumId): void
    {
        Stadium::query()->findOrFail($stadiumId)->delete();
    }

    public function render()
    {
        return view('livewire.manage-stadiums', [
            'stadiums' => Stadium::query()
                ->withCount(['events', 'sectors'])
                ->when($this->search !== '', fn ($query) => $query->where('name', 'like', "%{$this->search}%")->orWhere('city', 'like', "%{$this->search}%"))
                ->paginate(8),
        ]);
    }
}
