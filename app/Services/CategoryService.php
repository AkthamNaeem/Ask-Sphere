<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function create($request): array {
        $data = [];

        $category = Category::query()->create([
            'name' => $request['name'],
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
        ]);

        $data = $category;
        $message = 'success';
        $code = 200;
        return ['data' => $data, 'message' => $message, 'code' => $code];
    }

    public function index(): array {
        $data = [];

        $categories = Category::query()
            ->select('categories.id', 'categories.name',
                DB::raw('COUNT(DISTINCT questions.id) as questions_count'))
            ->leftJoin('questions', 'questions.category_id', '=', 'categories.id')
            ->groupBy('categories.id', 'categories.name')
            ->orderBy('questions_count', 'desc')
            ->get();

        $data = $categories;
        $message = 'success';
        $code = 200;
        return ['data' => $data, 'message' => $message, 'code' => $code];
    }

    public function show($request): array {
        $data = [];

        $category = Category::query()->select('categories.id', 'categories.name',
                DB::raw('COUNT(DISTINCT questions.id) as questions_count'))
            ->leftJoin('questions', 'questions.category_id', '=', 'categories.id')
            ->groupBy('categories.id', 'categories.name')
            ->find($request['category_id']);

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
