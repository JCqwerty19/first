<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(),
            'content' => $this->faker->text,
            'likes' => random_int(5, 2000),
            'category_id' => Category::get()->random()->id,
            'is_published' => 1,
        ];
    }
}
