<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $country = Country::create([
            'country_name' => 'Germany',
            'country_code' => 'DE'
        ]);
        $country = Country::create([
            'country_name' => 'Finland',
            'country_code' => 'FI'
        ]);
        $country = Country::create([
            'country_name' => 'Latvia',
            'country_code' => 'LV'
        ]);
    }
}
