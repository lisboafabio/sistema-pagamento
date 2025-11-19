<?php

namespace Database\Seeders;

use App\Models\SubAcquirer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubAcquirerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubAcquirer::firstOrCreate(['name' => 'SubadqA'], ['name' => 'SubadqA']);
        SubAcquirer::firstOrCreate(['name' => 'SubadqB'], ['name' => 'SubadqB']);
    }
}
