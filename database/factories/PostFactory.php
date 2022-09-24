<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->sentence(),
            'class' => $this->faker->numerify('class-####'),
            'body' => $this->faker->paragraph(),
            'aiptref' => $this->faker->numerify('aipt-####'),
            'country' => $this->faker->paragraph(),
            'status' => $this->faker->paragraph(),
            'user_id' => User::factory(),
            'category_id' => Category::all()->random()->id,
        ];
    }
}
