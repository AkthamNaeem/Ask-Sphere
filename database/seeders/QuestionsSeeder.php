<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Like;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i<100; $i++) {
            $question = Question::query()->create([
                'user_id' => rand(1,20),
                'category_id' => rand(1,20),
                'content' => fake()->text,
                'is_answered' => fake()->boolean(),
            ]);

            for($k=0; $k<20; $k++) {
                if(fake()->boolean)
                    Like::query()->create([
                        'user_id' => $k+1,
                        'likeable_id' => $question['id'],
                        'likeable_type' => 'question',
                    ]);
            }

            Answer::query()->create([
                'user_id' => rand(1,20),
                'question_id' => $question['id'],
                'content' => fake()->text,
                'is_best' => true,
            ]);

            Answer::query()->create([
                'user_id' => rand(1,20),
                'question_id' => $question['id'],
                'content' => fake()->text,
            ]);

            Answer::query()->create([
                'user_id' => rand(1,20),
                'question_id' => $question['id'],
                'content' => fake()->text,
            ]);
        }

        $answers = Answer::query()->get();
        foreach ($answers as $answer) {
            for($k=0; $k<20; $k++) {
                if(fake()->boolean)
                    Like::query()->create([
                        'user_id' => $k+1,
                        'likeable_id' => $answer['id'],
                        'likeable_type' => 'answer',
                    ]);
            }
        }
    }
}
