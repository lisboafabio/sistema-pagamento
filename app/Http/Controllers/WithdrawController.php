<?php

namespace App\Http\Controllers;

use App\Dto\CreateSubAcquirerTransactionDto;
use App\Exceptions\PixErrorException;
use App\Exceptions\WithdrawErrorException;
use App\Http\Requests\CreateSubAcquirerTransactionRequest;
use App\Services\PixService;
use App\Services\WithdrawService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class WithdrawController extends Controller
{

    public function __construct(private readonly WithdrawService $withdrawService, )
    {
    }

    public function getById(int $id): JsonResponse
    {
        try {
            return response()->json($this->withdrawService->getById($id), Response::HTTP_OK);
        } catch (WithdrawErrorException $exception) {
            return response()->json(["error" => $exception->getMessage()], $exception->getCode());
        } catch (Throwable $exception) {
            return response()->json(["error" => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function create(CreateSubAcquirerTransactionRequest $request): JsonResponse
    {
        try {
            $dto = CreateSubAcquirerTransactionDto::from($request->validated());
            $withdraw = $this->withdrawService->create($dto);
            return response()->json($withdraw, Response::HTTP_CREATED);
        } catch (WithdrawErrorException $exception) {
            return response()->json(["error" => $exception->getMessage()], $exception->getCode());
        } catch (Throwable $exception) {
            return response()->json(["error" => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
