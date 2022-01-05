<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Help;


class HelpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Help::factory()->times(10)->create();
    }
}
