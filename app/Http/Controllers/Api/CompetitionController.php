<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Resources\CompetitionResource;
use App\Models\Competition;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompetitionController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CompetitionResource::collection(Competition::query()->orderBy('name')->paginate(15));
    }

    public function store(StoreCompetitionRequest $request): JsonResponse
    {
        return (new CompetitionResource(Competition::query()->create($request->validated())))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Competition $competition): CompetitionResource
    {
        return new CompetitionResource($competition);
    }

    public function update(StoreCompetitionRequest $request, Competition $competition): JsonResponse
    {
        $competition->update($request->validated());

        return (new CompetitionResource($competition->refresh()))->response();
    }

    public function destroy(Competition $competition): JsonResponse
    {
        $this->authorize('delete', $competition);

        $competition->delete();

        return response()->json(status: 204);
    }
}
