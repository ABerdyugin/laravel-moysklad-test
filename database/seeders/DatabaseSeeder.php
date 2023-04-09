<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Counterparty;
use App\Models\Goods;
use App\Models\Group;
use App\Models\Service;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Counterparty::factory(20)->create();
        Goods::factory(20)->create();
        Service::factory(20)->create();
        Warehouse::factory(2)->create();
        Group::factory(2)->create();

    }
}
