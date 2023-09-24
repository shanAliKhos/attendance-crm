<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create(['name' => 'John Doe','email' => 'johndoe@test.com']);
        Employee::create(['name' => 'Jane Smith','email' => 'johnsmith@test.com']);
    }
}
