<section class="serko-card space-y-4 px-6 py-6">
    @foreach ($payments as $payment)
        <article class="flex flex-col justify-between gap-3 rounded-2xl border border-white/10 bg-black/25 px-4 py-3 md:flex-row md:items-center">
            <div>
                <p class="font-bold text-white">#{{ $payment->id }} - {{ $payment->transaction_id }}</p>
                <p class="text-sm text-gray-400">{{ $payment->method }} - {{ $payment->status }} - {{ $payment->order?->user?->email }}</p>
            </div>
            <div class="flex gap-2">
                <button wire:click="complete({{ $payment->id }})" class="serko-button-secondary px-3 py-2">Complete</button>
                <button wire:click="fail({{ $payment->id }})" class="serko-button-secondary px-3 py-2">Fail</button>
                <button wire:click="delete({{ $payment->id }})" class="serko-button px-3 py-2">Delete</button>
            </div>
        </article>
    @endforeach

    {{ $payments->links() }}
</section>
