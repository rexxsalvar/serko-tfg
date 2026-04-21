<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TeamController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return TeamResource::collection(
            Team::query()->searchName($request->string('search')->toString())->paginate(15)
        );
    }

    public function store(StoreTeamRequest $request): JsonResponse
    {
        return (new TeamResource(Team::query()->create($request->validated())))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Team $team): TeamResource
    {
        return new TeamResource($team);
    }

    public function update(StoreTeamRequest $request, Team $team): JsonResponse
    {
        $team->update($request->validated());

        return (new TeamResource($team->refresh()))->response();
    }

    public function destroy(Team $team): JsonResponse
    {
        $this->authorize('delete', $team);

        $team->delete();

        return response()->json(status: 204);
    }
}
