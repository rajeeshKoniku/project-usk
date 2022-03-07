<?php

namespace Database\Factories;

use App\Models\Ss;
use Illuminate\Database\Eloquent\Factories\Factory;

class SsFactory extends Factory
{

    protected $model = Ss::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_ss' => $this->faker->unique()->numerify('SS_###'),
            'sasaran' => $this->faker->text(255)
        ];
    }
}
