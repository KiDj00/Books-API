<?php

namespace Database\Factories;
use App\Models\Knjiga;
use App\Models\Autor;
use App\Models\Zanr;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class AutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ime'=>$this->faker->firstName(),

            'prezime'=>$this->faker->lastName(),

            'datum_rodjenja'=>$this->faker->date(),

            'pol'=>$this->faker->randomElement(['muski','zenski']),
        ];
    }
}
