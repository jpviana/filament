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
        \App\Models\Company::factory(100)->create();
        \App\Models\User::factory(100)->create();
        \App\Models\Customer::factory(100)->create();
        \App\Models\Post::factory(100)->create();
        \App\Models\Indication::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'company_id' => 1,
            'email' => 'test@email.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
