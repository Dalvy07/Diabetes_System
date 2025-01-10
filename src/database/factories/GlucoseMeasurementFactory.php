<?php

namespace Database\Factories;

use App\Models\GlucoseMeasurement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GlucoseMeasurement>
 */
class GlucoseMeasurementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = GlucoseMeasurement::class;

    public function definition(): array
    {
        return [
            'health_data_id'       => null, // будем задавать вручную при вызове
            'glucose_level'        => $this->faker->randomFloat(1, 3.0, 15.0),
            'measurement_datetime' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'is_before_meal'       => $this->faker->boolean,
            'note'                 => $this->faker->sentence,
        ];
    }
}
