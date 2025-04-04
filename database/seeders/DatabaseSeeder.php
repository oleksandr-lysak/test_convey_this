<?php

namespace Database\Seeders;

use App\Models\Domain;
use App\Models\Plan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Plan::insert([
            [
                'plan_name' => 'Basic',
                'price' => 10,
                'features' => json_encode([
                    'Storage' => '10GB',
                    'Users' => '1 User'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan_name' => 'Standard',
                'price' => 25,
                'features' => json_encode([
                    'Storage' => '50GB',
                    'Support' => 'Email & Chat Support',
                    'Users' => 'Up to 5 Users'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan_name' => 'Premium',
                'price' => 50,
                'features' => json_encode([
                    'Storage' => '200GB',
                    'Support' => 'Priority Support',
                    'Daily reports' => '',
                    'Users' => 'Unlimited Users'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        //TODO: Remove this when use real mysql database
        DB::statement('PRAGMA foreign_keys = OFF;');
        User::factory(25)->create()->each(function ($user) {
            DB::transaction(function () use ($user) {
                Domain::factory(1)->create(['user_id' => $user->id]);
            });
        });
        //TODO: Remove this when use real mysql database
        DB::statement('PRAGMA foreign_keys = ON;');
    }
}
