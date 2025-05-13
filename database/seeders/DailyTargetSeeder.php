<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                DB::table('daily_targets')->insert([
            [
                'time' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'time' => '15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'time' => '20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'time' => '30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'time' => '40',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
