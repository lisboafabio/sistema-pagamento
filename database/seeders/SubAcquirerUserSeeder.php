<?php

namespace Database\Seeders;

use App\Models\SubAcquirer;
use App\Models\SubAcquirerUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class SubAcquirerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            SubAcquirerUser::create([
                'user_id' => $user->id,
                'sub_acquirer_id' => $user->id
            ]);
        }
    }
}
