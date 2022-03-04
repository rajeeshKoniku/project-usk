<?php

namespace Database\Seeders;

use App\Models\Ik;
use App\Models\Program;
use App\Models\Ss;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Ss::factory()->count(3)->has(
            Ik::factory()->count(20)->kodeIk()->has(
                Program::factory()->count(3)->kodeProg()
            )
        )->create();
    }
}
