<?php

namespace App\Http\Controllers;


use App\Dto\CreateUserDto;
use App\Dto\SubAcquirerDto;
use App\Http\Requests\SubAcquirerRequest;
use App\Services\SubAcquirerService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SubAcquirerController extends Controller
{

    public function __construct(private readonly SubAcquirerService $service)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->index());
    }

    public function getById(int $id): JsonResponse
    {
        return response()->json($this->service->getById($id));
    }

    public function create(SubAcquirerRequest $request): JsonResponse
    {
        $dto = SubAcquirerDto::from($request->validated());
        $service = $this->service->create($dto);
        return response()->json($service, Response::HTTP_CREATED);
    }

    public function update(SubAcquirerRequest $request, int $id): JsonResponse
    {
        $dto = SubAcquirerDto::from($request->validated());
        $subAcquirerUpdated = $this->service->update($dto, $id);

        if (!$subAcquirerUpdated) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function delete(int $id): JsonResponse
    {
        $subAcquirerDeleted = $this->service->delete($id);

        if (!$subAcquirerDeleted) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

}
