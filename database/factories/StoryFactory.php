<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Story::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['long', 'short']);
        $description = ($type == 'short') ? $this->faker->text(100) : $this->faker->paragraph();

        $story = [
            'user_id' => User::factory(),
            'title' => $this->faker->unique()->lexify('?????? ???? ????'),
            'description' => $description,
            'type' => $type,
            'status' => $this->faker->boolean()
        ];

        return $story;
    }
}