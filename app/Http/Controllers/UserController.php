<?php

namespace App\Http\Controllers;

use App\Dto\CreateUserDto;
use App\Dto\UpdateUserDto;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->userService->index());
    }

    public function getById(int $id): JsonResponse
    {
        $user = $this->userService->getById($id);

        if (!$user) {
            return response()->json(['error' => 'user not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($user);
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        $dto = CreateUserDto::from($request->validated());
        $userService = $this->userService->create($dto);
        return response()->json($userService, Response::HTTP_CREATED);
    }

    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        $dto = UpdateUserDto::from($request->validated());
        $user = $this->userService->update($dto, $id);
        if (!$user) {
            return response()->json(['error' => 'user not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): JsonResponse
    {
        $userDeleted = $this->userService->delete($id);
        if (!$userDeleted) {
            return response()->json(['error' => 'user not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
