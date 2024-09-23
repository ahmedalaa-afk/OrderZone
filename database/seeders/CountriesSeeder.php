<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            'Egypt',
            'Iraq',
            'Jordan',
            'Lebanon',
            'Saudi Arabia',
            'Syria',
            'Tunisia',
            'United Arab Emirates',
        ];

        foreach ($countries as $country) {
            \App\Models\Country::create(['name' => $country]);
        }
    }
}
