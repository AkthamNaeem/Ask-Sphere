<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function create(CreateCategoryRequest $request): JsonResponse {
        $data = $this->categoryService->create($request);
        return response()->json(['data' => $data['data'], 'message' => $data['message']], $data['code']);
    }

    public function update(UpdateCategoryRequest $request): JsonResponse {
        $data = $this->categoryService->update($request);
        return response()->json(['data' => $data['data'], 'message' => $data['message']], $data['code']);
    }

    public function index(): JsonResponse {
        $data = $this->categoryService->index();
        return response()->json(['data' => $data['data'], 'message' => $data['message']], $data['code']);
    }

    public function show(CategoryRequest $request): JsonResponse {
        $data = $this->categoryService->show($request);
        return response()->json(['data' => $data['data'], 'message' => $data['message']], $data['code']);
    }

    public function delete(CategoryRequest $request): JsonResponse {
        $data = $this->categoryService->delete($request);
        return response()->json(['data' => $data['data'], 'message' => $data['message']], $data['code']);
    }
}
