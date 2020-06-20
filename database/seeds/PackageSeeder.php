<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'sponsorship_cost' => '2.99',
            'sponsorship_duration' => '24',
        ]);
        DB::table('packages')->insert([
            'sponsorship_cost' => '5.99',
            'sponsorship_duration' => '72',
        ]);
        DB::table('packages')->insert([
            'sponsorship_cost' => '9.99',
            'sponsorship_duration' => '144',
        ]);
    }
}
