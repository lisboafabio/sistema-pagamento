<?php

namespace Database\Seeders;

use App\Models\SubAcquirer;
use App\Models\SubAcquirerAccount;
use Illuminate\Database\Seeder;

class SubAcquirerAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subAcquierers = SubAcquirer::all();

        foreach ($subAcquierers as $subAcquierer) {
            SubAcquirerAccount::firstOrCreate([
                'sub_acquirer_id' => $subAcquierer->id,
            ],[
                'sub_acquirer_id' => $subAcquierer->id,
            ]);
        }
    }
}
