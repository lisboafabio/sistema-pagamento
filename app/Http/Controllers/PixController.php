<?php

namespace App\Http\Controllers;

use App\Dto\CreateSubAcquirerTransactionDto;
use App\Exceptions\PixErrorException;
use App\Http\Requests\CreateSubAcquirerTransactionRequest;
use App\Services\PixService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class PixController extends Controller
{

    public function __construct(private readonly PixService $pixService, )
    {
    }

    public function getById(int $id): JsonResponse
    {
        try {
            return response()->json($this->pixService->getById($id), Response::HTTP_OK);
        } catch (PixErrorException $exception) {
            return response()->json(["error" => $exception->getMessage()], $exception->getCode());
        } catch (Throwable $exception) {
            return response()->json(["error" => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function create(CreateSubAcquirerTransactionRequest $request): JsonResponse
    {
        try {
            $dto = CreateSubAcquirerTransactionDto::from($request->validated());
            $pixCreated = $this->pixService->create($dto);
            return response()->json($pixCreated, Response::HTTP_CREATED);
        } catch (PixErrorException $exception) {
            return response()->json(["error" => $exception->getMessage()], $exception->getCode());
        } catch (Throwable $exception) {
            return response()->json(["error" => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
