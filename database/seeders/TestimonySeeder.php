<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Testimony;


class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimony::factory()->times(10)->create();
    }
}
