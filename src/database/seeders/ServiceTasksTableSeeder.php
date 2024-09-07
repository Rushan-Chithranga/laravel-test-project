<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_tasks')->insert([
            [
                'task_name' => 'Full wash',
                'price' => 3000,
                'estimate_time' => 1 * 60,
                'service_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Body wash',
                'price' => 2500,
                'estimate_time' => 1.5 * 60,
                'service_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Vacuum',
                'price' => 3500,
                'estimate_time' => 2 * 60,
                'service_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Shampoo',
                'price' => 2000,
                'estimate_time' => 2.25 * 60,
                'service_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Engine oil replacement',
                'price' => 5000,
                'estimate_time' => 3 * 60,
                'service_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Brake oil replacement',
                'price' => 4000,
                'estimate_time' => 3.5 * 60,
                'service_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Coolant replacement',
                'price' => 6000,
                'estimate_time' => 4 * 60,
                'service_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Air filter replacement',
                'price' => 7000,
                'estimate_time' => 4.75 * 60,
                'service_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Oil filter replacement',
                'price' => 7500,
                'estimate_time' => 5 * 60,
                'service_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'AC filter replacement',
                'price' => 8000,
                'estimate_time' => 5.5 * 60,
                'service_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Brake shoes replacement',
                'price' => 8500,
                'estimate_time' => 6 * 60,
                'service_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
