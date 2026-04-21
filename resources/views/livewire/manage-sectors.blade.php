<section class="serko-card space-y-5 px-6 py-6">
    <form wire:submit="save" class="grid gap-3 md:grid-cols-[1fr_1fr_1fr_auto]">
        <x-select wire:model="stadium_id" name="stadium_id">
            <option value="">Stadium</option>
            @foreach ($stadiums as $stadium)
                <option value="{{ $stadium->id }}">{{ $stadium->name }}</option>
            @endforeach
        </x-select>
        <x-input wire:model="name" name="name" placeholder="{{ __('serko.nav.sectors') }}" />
        <x-input wire:model="type" name="type" placeholder="general/vip/family" />
        <button class="serko-button" type="submit">{{ __('serko.admin.save') }}</button>
    </form>

    <div class="grid gap-3">
        @foreach ($sectors as $sector)
            <article class="flex items-center justify-between rounded-2xl bg-white px-4 py-3">
                <span class="font-bold">{{ $sector->stadium->name }} / {{ $sector->name }} / {{ $sector->type }}</span>
                <div class="flex gap-2">
                    <button wire:click="edit({{ $sector->id }})" class="serko-button-secondary px-3 py-2">Edit</button>
                    <button wire:click="delete({{ $sector->id }})" class="serko-button px-3 py-2">Delete</button>
                </div>
            </article>
        @endforeach
    </div>

    {{ $sectors->links() }}
</section>
