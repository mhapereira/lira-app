<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instituto>
 */
class InstitutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sobre' => $this->faker->paragraphs(2, true),

            'ata' => [
                [
                    'name' => $this->faker->sentence(3),
                    'arquivo' => 'transparencia/' . $this->faker->uuid() . '.pdf',
                ],
            ],

            'instituto' => [
                [
                    'name' => $this->faker->sentence(2),
                    'arquivo' => 'transparencia/' . $this->faker->uuid() . '.pdf',
                ],
            ],

            'docs' => [
                [
                    'name' => $this->faker->sentence(2),
                    'arquivo' => 'transparencia/' . $this->faker->uuid() . '.pdf',
                ],
            ],

            'financeiro' => [
                [
                    'name' => 'Relatório ' . $this->faker->monthName(),
                    'arquivo' => 'transparencia/' . $this->faker->uuid() . '.pdf',
                ],
            ],
        ];
    }
}
