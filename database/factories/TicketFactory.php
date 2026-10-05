<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'statut'=>fake()->randomElement([
                'OPEN',
                'IN_PROGRESS',
                'RESOLVED',
                'CLOSED',
            ]),
            'priorite'=>fake()->randomElement([
                'LOW',
                'MEDIUM',
                'HIGH',
                'URGENT',
            ]),
            'user_id'=>1,
            'category_id'=>1,
        ];
    }
}
