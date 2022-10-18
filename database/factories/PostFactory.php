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
            'aiptref' => $this->faker->numerify('aipt-####'),
            'title' => $this->faker->sentence(),
            'agent'=> $this->faker->company(),
            'annuitydue'=> $this->faker->paragraph(),
            'annuitydeadline'=> $this->faker->date(),
            'clientref' => $this->faker->numerify('aipt-####'),
            'slug' => $this->faker->numerify('#####'),
            'excerpt' => $this->faker->company(),
            'class' => $this->faker->numerify('class-####'),
            'registrationno' => $this->faker->numerify('####'),
            'registrationdate' => $this->faker->date(),
            'renewal' => $this->faker->date(),
            'body' => $this->faker->paragraph(),
            'aiptref' => $this->faker->numerify('aipt-####'),
            'country' => $this->faker->country(),
            'status' => $this->faker->paragraph(),
            'user_id' => User::factory(),
            'category_id' => Category::all()->random()->id,
        ];
    }
}
