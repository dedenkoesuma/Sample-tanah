<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Objectivity;
use App\Models\Type;
use App\Models\Unit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Client::factory(10)->create();
        Objectivity::factory(10)->create();
        Type::factory(10)->create();
        Unit::factory(10)->create();
    }
}
