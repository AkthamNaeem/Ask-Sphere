<?php

namespace Database\Seeders;

use App\Models\Category;
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
                'icon' => 'technologyandinformation'
            ],
            [
                'name' => 'Finance and Accounting',
                'icon' => 'financeandaccounting'
            ],
            [
                'name' => 'Marketing and Sales',
                'icon' => 'marketingandsales'
            ],
            [
                'name' => 'Healthcare',
                'icon' => 'healthcare'
            ],
            [
                'name' => 'Manufacturing',
                'icon' => 'manufacturing'
            ],
            [
                'name' => 'Agriculture and Natural Resources',
                'icon' => 'agricultureandnaturalresources'
            ],
            [
                'name' => 'Education',
                'icon' => 'education'
            ],
            [
                'name' => 'Legal Services',
                'icon' => 'legalservices'
            ],
            [
                'name' => 'Entertainment and Media',
                'icon' => 'entertainmentandmedia'
            ],
            [
                'name' => 'Tourism and Hospitality',
                'icon' => 'tourismandhospitality'
            ],
            [
                'name' => 'Construction and Engineering',
                'icon' => 'constructionandengineering'
            ],
            [
                'name' => 'Logistics and Transportation',
                'icon' => 'logisticsandtransportation'
            ],
            [
                'name' => 'Energy',
                'icon' => 'energy'
            ],
            [
                'name' => 'Public Services and Government',
                'icon' => 'publicservicesandgovernment'
            ],
            [
                'name' => 'Innovation and Entrepreneurship',
                'icon' => 'innovationandentrepreneurship'
            ],
            [
                'name' => 'Environment and Sustainability',
                'icon' => 'environmentandsustainability'
            ],
            [
                'name' => 'E-Commerce',
                'icon' => 'ecommerce'
            ],
            [
                'name' => 'Sports and Fitness',
                'icon' => 'sportsandfitness'
            ],
            [
                'name' => 'Personal Services',
                'icon' => 'personalservices'
            ],
            [
                'name' => 'Research and Development',
                'icon' => 'researchanddevelopment'
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->create([
                'name' => $category['name'],
                'icon' => 'categories/' . $category['icon']
            ]);
        }
    }
}
