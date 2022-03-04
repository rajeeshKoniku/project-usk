<?php

namespace Database\Factories;

use App\Http\Controllers\IkController;
use App\Models\Ik;
use App\Models\Ss;
use Illuminate\Database\Eloquent\Factories\Factory;

class IkFactory extends Factory
{

    protected $model = Ik::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'indikator_kinerja' => $this->faker->text(),
        ];
    }

    public function kodeIk()
    {
        return $this->state(function (array $attributes, Ss $ss) {
            $nomorSS = trim($ss->kode_ss, 'SS_');
            $ik = $this->faker->randomElement(['IKU', 'IKT']);
            return ['kode_ik' => $ik . '_' . $nomorSS  . '.' . $this->faker->unique()->numberBetween(1, 100)];
        });
    }
}
