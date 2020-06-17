<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'service_name' => 'WiFi',
        ]);
        DB::table('services')->insert([
            'service_name' => 'Parking Spot',
        ]);
        DB::table('services')->insert([
            'service_name' => 'Pool',
        ]);
        DB::table('services')->insert([
            'service_name' => 'Reception',
        ]);
        DB::table('services')->insert([
            'service_name' => 'Sauna',
        ]);
        DB::table('services')->insert([
            'service_name' => 'Sea View',
        ]);
    }
}
