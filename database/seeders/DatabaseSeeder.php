<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()
            ->count(5)
            ->has(
                \App\Models\Pet::factory()
                    ->count(3)
                    ->has(
                        \App\Models\Review::factory()
                            ->count(3)
                    )
            )
            ->create();

        \App\Models\Sitter::factory()
            ->count(5)
            ->has(
                \App\Models\Review::factory()
                            ->count(3)
            )
            ->has(
                \App\Models\Service::factory()
                            ->count(3)
            )
            ->create();
    }
}
