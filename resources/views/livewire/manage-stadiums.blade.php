<section class="space-y-4">
    <x-input wire:model.live="search" name="search" placeholder="Buscar estadio..." />

    <div class="grid gap-4">
        @foreach ($stadiums as $stadium)
            <article class="serko-card flex flex-col gap-4 px-6 py-5 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-xl font-bold">{{ $stadium->name }}</h2>
                    <p class="text-sm text-slate-600">{{ $stadium->city }} - {{ $stadium->events_count }} eventos</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.stadiums.edit', $stadium) }}" class="serko-button-secondary">Editar</a>
                    <button wire:click="delete({{ $stadium->id }})" class="serko-button-secondary">Eliminar</button>
                </div>
            </article>
        @endforeach
    </div>

    {{ $stadiums->links() }}
</section>
