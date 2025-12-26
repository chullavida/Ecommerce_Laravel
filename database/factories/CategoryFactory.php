<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        // Generamos un nombre único para cada categoría
        $name = $this->faker->unique()->word;

        return [
            'name' => $name,
            'slug' => Str::slug($name),  // Slug generado a partir del nombre
            'description' => $this->faker->paragraph,  // Descripción generada aleatoriamente
        ];
    }
}
