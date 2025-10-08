<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Team;
use App\Models\User;
use App\Models\Version;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Team::factory()
            ->count(5)
            ->has(
                User::factory()
                    ->count(5)
                    ->state(fn (array $attributes, Team $team) => [
                        'team_id' => $team->id,
                    ])
            )
            ->has(
                Document::factory()
                    ->count(10)
                    ->has(
                        Version::factory()
                            ->count(3)
                            ->sequence(fn ($sequence) => [
                                'version_number' => $sequence->index + 1,
                            ])
                    )
            )
            ->create();

        Document::all()->each(function (Document $doc) {
            $latest = $doc->versions()->orderByDesc('version_number')->first();
            $doc->update(['current_version_id' => $latest?->id]);
        });
    }
}
