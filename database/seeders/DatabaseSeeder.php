<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Asset;
use App\Models\Issue;
use App\Models\Release;
use App\Models\Repository;
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
        $repositories = Repository::factory(10)->create();

        foreach ($repositories as $repository) {
            $releases = Release::factory(5)->for($repository)->create();
            $issues = Issue::factory(20)->for($repository)->create();

            foreach ($releases as $release) {
                Asset::factory(2)->for($release)->create();
            }
        }

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
