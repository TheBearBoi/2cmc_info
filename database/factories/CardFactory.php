<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'oracle_id' => 'Oracle ID',
            'name' => 'Card Name (with //)',
            'layout' => 'Card Layout',
            'cmc' => '0.0',
            'color' => '00000'
        ];
    }
}
