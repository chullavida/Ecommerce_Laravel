<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(3,true);

        return [
            'category_id' => Category::inRandomOrder()->value('id') ?? Category::factory(),
            'brand_id' => Brand::inRandomOrder()->value('id') ?? Brand::factory(),
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->optional()->paragraphs(2,true),
            'price' => $this->faker->randomFloat(2,5,500),
            'stock' => $this->faker->numberBetween(0,200),
            'image' => $this->faker->imageUrl(640,480,'technics',true),
            'status' => $this->faker->randomElement(['active','inactive']),
        ];
    }
}
