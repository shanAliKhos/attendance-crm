<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create(['employee_id' => 1, 'shift_id' => 1, 'location_id' => 1, 'date' => '2023-09-25']);
        Schedule::create(['employee_id' => 2, 'shift_id' => 2, 'location_id' => 2, 'date' => '2023-09-26']);
    }
}
