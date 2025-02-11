<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // [Default User Data Seeding]
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'test@example.com',
        ]);
        
        User::factory()->create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
        ]);

        // [Department Data Seeding]
        $departments = [
            'Accounting',
            'Business Development',
            'Engineering',
            'Human Resources',
            'Legal',
            'Marketing',
            'Product Management',
            'Sales',
            'Training',
        ];

        foreach ($departments as $department) {
            Department::create(['name' => $department]);
        }

        // [Employee Data Seeding]
        Employee::factory(15)->create();
    }
}
