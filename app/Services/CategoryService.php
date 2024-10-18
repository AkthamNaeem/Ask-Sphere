<?php

namespace App\Services;

use App\Models\Category;
use function Laravel\Prompts\select;

class CategoryService
{
    public function create($request): array {
        $data = [];

        $category = Category::query()->create([
            'name' => $request['name'],
            'icon' => $request['icon'] ?? null,
        ]);

        $data = $category;
        $message = 'success';
        $code = 200;
        return ['data' => $data, 'message' => $message, 'code' => $code];
    }

    public function update($request): array {
        $data = [];

        $category = Category::query()->find($request['category_id']);

        $category->update([
            'name' => $request['name'] ?? $category['name'],
            'icon' => $request['icon'] ?? $category['icon'],
        ]);

        $data = $category;
        $message = 'success';
        $code = 200;
        return ['data' => $data, 'message' => $message, 'code' => $code];
    }

    public function index(): array {
        $data = [];

        $categories = Category::query()->select('id', 'name', 'icon')->orderBy('name')->get();

        $data = $categories;
        $message = 'success';
        $code = 200;
        return ['data' => $data, 'message' => $message, 'code' => $code];
    }

    public function show($request): array {
        $data = [];

        $category = Category::query()->find($request['category_id']);

        $data = $category;
        $message = 'success';
        $code = 200;
        return ['data' => $data, 'message' => $message, 'code' => $code];
    }

    public function delete($request): array {
        $data = [];

        $category = Category::query()->find($request['category_id']);

        $category->delete();

        $message = 'success';
        $code = 200;
        return ['data' => $data, 'message' => $message, 'code' => $code];
    }
}
