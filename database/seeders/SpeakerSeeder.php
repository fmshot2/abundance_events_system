<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speaker;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speaker::factory()->times(100)->create();

    }
}
