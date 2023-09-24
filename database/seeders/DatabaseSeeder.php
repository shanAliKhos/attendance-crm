<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AttendanceFaultsSeeder::class);
        $this->call(AttendancesSeeder::class);
        $this->call(EmployeesSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(SchedulesSeeder::class);
        $this->call(ShiftsSeeder::class);
    }
}
