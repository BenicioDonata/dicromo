<?php

namespace Modules\Task\DataBase\Factories;

use Modules\Task\Entities\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'name' => $this->faker->title(),
        ];
    }
}
