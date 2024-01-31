<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{

    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'name'=> $this->faker->sentence,
            'image_path'=> $this->faker->image(),
            'slug'=> $this->faker->slug,
            'description'=> $this->faker->paragraph,
            'author'=> $this->faker->name,
            'price'=>$this->faker->randomNumber()
        ];
    }
}
