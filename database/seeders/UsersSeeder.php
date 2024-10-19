<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\password;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i<20; $i++) {
            User::query()->create([
                'name' => fake()->name,
                'email' => fake()->email,
                'password' => bcrypt('12345678'),
            ]);
        }
    }
}
