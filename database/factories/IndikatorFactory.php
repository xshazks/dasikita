<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Indikator>
 */
class IndikatorFactory extends Factory
{
    protected $model = \App\Models\Indikator::class;

    public function definition()
    {
        return [
            'kelurahan_id' => \App\Models\Kelurahan::factory(), // Hubungkan dengan kelurahan
            'indikator' => $this->faker->word,                // Nama indikator dummy
            'target_2023' => $this->faker->numberBetween(50, 100),
            'pencapaian_2023' => $this->faker->numberBetween(30, 100),
            'target_2024' => $this->faker->numberBetween(60, 120),
            'pencapaian_2024' => $this->faker->numberBetween(40, 110),
        ];
    }
}
