<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStadiumRequest;
use App\Http\Resources\StadiumResource;
use App\Models\Stadium;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StadiumController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return StadiumResource::collection(Stadium::query()->withCount(['events', 'sectors'])->paginate(15));
    }

    public function store(StoreStadiumRequest $request): JsonResponse
    {
        $stadium = Stadium::query()->create($request->validated());

        return (new StadiumResource($stadium))->response()->setStatusCode(201);
    }

    public function show(Stadium $stadium): StadiumResource
    {
        return new StadiumResource($stadium->load(['sectors.seats', 'events.homeTeam', 'events.awayTeam']));
    }

    public function update(StoreStadiumRequest $request, Stadium $stadium): JsonResponse
    {
        $stadium->update($request->validated());

        return (new StadiumResource($stadium->refresh()))->response();
    }

    public function destroy(Stadium $stadium): JsonResponse
    {
        $this->authorize('delete', $stadium);

        $stadium->delete();

        return response()->json(status: 204);
    }
}
