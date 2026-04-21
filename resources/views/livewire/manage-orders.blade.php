<section class="serko-card space-y-4 px-6 py-6">
    @foreach ($orders as $order)
        <article class="flex flex-col justify-between gap-3 rounded-2xl bg-white px-4 py-3 md:flex-row md:items-center">
            <div>
                <p class="font-bold">#{{ $order->id }} - {{ $order->user?->email }}</p>
                <p class="text-sm text-slate-600">{{ $order->status }} - {{ number_format($order->total_price, 2) }} EUR - {{ $order->tickets_count }} tickets</p>
            </div>
            <div class="flex gap-2">
                <button wire:click="markPaid({{ $order->id }})" class="serko-button-secondary px-3 py-2">Paid</button>
                <button wire:click="cancel({{ $order->id }})" class="serko-button-secondary px-3 py-2">Cancel</button>
                <button wire:click="delete({{ $order->id }})" class="serko-button px-3 py-2">Delete</button>
            </div>
        </article>
    @endforeach

    {{ $orders->links() }}
</section>
