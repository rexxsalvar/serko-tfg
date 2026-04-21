<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class ManagePayments extends Component
{
    use WithPagination;

    public function complete(int $paymentId): void
    {
        Payment::query()->findOrFail($paymentId)->update(['status' => 'completed']);
    }

    public function fail(int $paymentId): void
    {
        Payment::query()->findOrFail($paymentId)->update(['status' => 'failed']);
    }

    public function delete(int $paymentId): void
    {
        Payment::query()->findOrFail($paymentId)->delete();
    }

    public function render()
    {
        return view('livewire.manage-payments', [
            'payments' => Payment::query()->with('order.user')->latest()->paginate(8),
        ]);
    }
}
