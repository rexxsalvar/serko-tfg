<section class="serko-card space-y-5 px-6 py-6">
    <form wire:submit="save" class="grid gap-3 md:grid-cols-[1fr_auto]">
        <x-input wire:model="name" name="name" placeholder="{{ __('serko.nav.competitions') }}" />
        <button class="serko-button" type="submit">{{ __('serko.admin.save') }}</button>
    </form>

    <div class="grid gap-3">
        @foreach ($competitions as $competition)
            <article class="flex items-center justify-between rounded-2xl bg-white px-4 py-3">
                <span class="font-bold">{{ $competition->name }}</span>
                <div class="flex gap-2">
                    <button wire:click="edit({{ $competition->id }})" class="serko-button-secondary px-3 py-2">Edit</button>
                    <button wire:click="delete({{ $competition->id }})" class="serko-button px-3 py-2">Delete</button>
                </div>
            </article>
        @endforeach
    </div>

    {{ $competitions->links() }}
</section>
