<?php

namespace Database\Factories;

use App\Models\Ik;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'program' => $this->faker->text(),
        ];
    }

    public function kodeProg()
    {
        return $this->state(function (array $attributes, Ik $ik) {
            return ['kode_prog' => $ik->kode_ik . '.' . $this->faker->unique()->numberBetween(1, 1000)];
        });
    }
}
