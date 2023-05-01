<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        $statuses = [
          Task::ACTIVE,
          Task::IN_PROGRESS,
          Task::CLOSED
        ];

        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'project_id' => $this->faker->numberBetween(1, 50),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement($statuses),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
