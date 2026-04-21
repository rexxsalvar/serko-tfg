<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = $request->user()->isBackoffice()
            ? Payment::query()
            : Payment::query()->whereHas('order', fn ($builder) => $builder->where('user_id', $request->user()->id));

        return PaymentResource::collection($query->with('order')->latest()->paginate(15));
    }

    public function show(Payment $payment): PaymentResource
    {
        $this->authorize('view', $payment);

        return new PaymentResource($payment);
    }

    public function update(Request $request, Payment $payment): JsonResponse
    {
        $this->authorize('update', $payment);

        $validated = $request->validate([
            'method' => ['sometimes', 'string', 'max:80'],
            'status' => ['sometimes', Rule::in(['pending', 'completed', 'paid', 'captured', 'failed', 'refunded'])],
            'transaction_id' => ['nullable', 'string', 'max:255'],
        ]);

        $payment->update($validated);

        return (new PaymentResource($payment->refresh()))->response();
    }
}
