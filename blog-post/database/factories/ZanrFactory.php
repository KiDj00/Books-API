<?php

namespace Database\Factories;
use App\Models\Knjiga;
use App\Models\Autor;
use App\Models\Zanr;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zanr>
 */
class ZanrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'naziv'=>$this->faker->unique()->word(),
        ];
    }
}
