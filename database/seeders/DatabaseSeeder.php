<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $this->call([
            UserTypeSeeder::class,
            RankDegreeSeeder::class,
            CombatArmSeeder::class,
            SectionSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            MilitaryCommandSeeder::class,
            MilitaryRegionSeeder::class,
            MilitaryOrganizationSeeder::class,
        ]);
    }
}
