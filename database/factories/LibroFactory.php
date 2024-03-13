<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    protected $model = Libro::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'autor' => $this->faker->name,
            'fecha_publicacion' => $this->faker->year,
            'genero' => $this->faker->word,

        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Libro $libro) {
            // Puedes realizar acciones adicionales después de crear el libro
        });
    }
}
