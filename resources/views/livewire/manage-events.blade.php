<section class="space-y-4">
    <x-input wire:model.live="search" name="search" placeholder="Buscar evento..." />

    <div class="grid gap-4">
        @foreach ($events as $event)
            <article class="serko-card flex flex-col gap-4 px-6 py-5 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-xl font-bold text-white">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</h2>
                    <p class="text-sm text-gray-400">{{ $event->stadium->name }} - {{ $event->date->format('d/m/Y H:i') }}</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.events.edit', $event) }}" class="serko-button-secondary">Editar</a>
                    <button wire:click="delete({{ $event->id }})" class="serko-button-secondary">Eliminar</button>
                </div>
            </article>
        @endforeach
    </div>

    {{ $events->links() }}
</section>
