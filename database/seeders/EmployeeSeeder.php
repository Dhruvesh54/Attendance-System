<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Employee::factory(200)->create();
    }
}
