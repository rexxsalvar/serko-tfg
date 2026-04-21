<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class ManageOrders extends Component
{
    use WithPagination;

    public function markPaid(int $orderId): void
    {
        Order::query()->findOrFail($orderId)->update(['status' => 'paid']);
    }

    public function cancel(int $orderId): void
    {
        Order::query()->findOrFail($orderId)->update(['status' => 'cancelled']);
    }

    public function delete(int $orderId): void
    {
        Order::query()->findOrFail($orderId)->delete();
    }

    public function render()
    {
        return view('livewire.manage-orders', [
            'orders' => Order::query()->with('user')->withTicketTotals()->latest()->paginate(8),
        ]);
    }
}
