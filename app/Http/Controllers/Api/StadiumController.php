<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStadiumRequest;
use App\Models\Stadium;
use Illuminate\Http\JsonResponse;

class StadiumController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Stadium::query()->withCount(['events', 'sectors'])->paginate(15));
    }

    public function store(StoreStadiumRequest $request): JsonResponse
    {
        $stadium = Stadium::query()->create($request->validated());

        return response()->json($stadium, 201);
    }

    public function show(Stadium $stadium): JsonResponse
    {
        return response()->json($stadium->load(['sectors.seats', 'events.homeTeam', 'events.awayTeam']));
    }

    public function update(StoreStadiumRequest $request, Stadium $stadium): JsonResponse
    {
        $stadium->update($request->validated());

        return response()->json($stadium);
    }

    public function destroy(Stadium $stadium): JsonResponse
    {
        $stadium->delete();

        return response()->json(status: 204);
    }
}
