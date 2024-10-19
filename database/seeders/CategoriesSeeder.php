<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Technology and Information',
            ],
            [
                'name' => 'Finance and Accounting',
            ],
            [
                'name' => 'Marketing and Sales',
            ],
            [
                'name' => 'Healthcare',
            ],
            [
                'name' => 'Manufacturing',
            ],
            [
                'name' => 'Agriculture and Natural Resources',
            ],
            [
                'name' => 'Education',
            ],
            [
                'name' => 'Legal Services',
            ],
            [
                'name' => 'Entertainment and Media',
            ],
            [
                'name' => 'Tourism and Hospitality',
            ],
            [
                'name' => 'Construction and Engineering',
            ],
            [
                'name' => 'Logistics and Transportation',
            ],
            [
                'name' => 'Energy',
            ],
            [
                'name' => 'Public Services and Government',
            ],
            [
                'name' => 'Innovation and Entrepreneurship',
            ],
            [
                'name' => 'Environment and Sustainability',
            ],
            [
                'name' => 'E-Commerce',
            ],
            [
                'name' => 'Sports and Fitness',
            ],
            [
                'name' => 'Personal Services',
            ],
            [
                'name' => 'Research and Development',
            ]
        ];

        foreach ($categories as $category) {
            $newCategory = Category::query()->create([
                'name' => $category['name'],
            ]);
        }
    }
}
