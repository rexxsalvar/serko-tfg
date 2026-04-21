<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectorRequest;
use App\Http\Resources\SectorResource;
use App\Models\Sector;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SectorController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return SectorResource::collection(Sector::query()->withCount('seats')->paginate(15));
    }

    public function store(StoreSectorRequest $request): JsonResponse
    {
        return (new SectorResource(Sector::query()->create($request->validated())->loadCount('seats')))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Sector $sector): SectorResource
    {
        return new SectorResource($sector->load('seats')->loadCount('seats'));
    }

    public function update(StoreSectorRequest $request, Sector $sector): JsonResponse
    {
        $sector->update($request->validated());

        return (new SectorResource($sector->refresh()->loadCount('seats')))->response();
    }

    public function destroy(Sector $sector): JsonResponse
    {
        $this->authorize('delete', $sector);

        $sector->delete();

        return response()->json(status: 204);
    }
}
