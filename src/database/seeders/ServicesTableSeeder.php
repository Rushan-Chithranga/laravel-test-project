<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            ['service_name' => 'Washing section', 'created_at' => now(), 'updated_at' => now()],
            ['service_name' => 'Interior cleaning section', 'created_at' => now(), 'updated_at' => now()],
            ['service_name' => 'Service section', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
