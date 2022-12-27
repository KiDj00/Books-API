<?php

namespace Database\Factories;
use App\Models\Knjiga;
use App\Models\Autor;
use App\Models\Zanr;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Knjiga>
 */
class KnjigaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'naziv' => $this->faker->unique()->word(),

            'godina_izdanja'=> $this->faker->year(),

            'opis' => $this->faker->unique()->sentence(),

            'user_id' => User::factory(),

            'zanr_id'=> Zanr::factory(),

            'autor_id'=> Autor::factory()

        ];
    }
}
