<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\CategoryService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request): JsonResponse {
        $data = $this->userService->register($request);
        return response()->json(['data' => $data['data'], 'message' => $data['message']], $data['code']);
    }

    public function login(LoginRequest $request): JsonResponse {
        $data = $this->userService->login($request);
        return response()->json(['data' => $data['data'], 'message' => $data['message']], $data['code']);
    }


}
