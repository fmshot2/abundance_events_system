<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\About;



class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::factory()->times(1)->create();
    }
}
