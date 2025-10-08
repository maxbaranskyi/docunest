<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->company();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'owner_id' => null,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Team $team) {
            $owner = User::factory()->create([
                'team_id' => $team->id,
            ]);

            $team->owner_id = $owner->id;
            $team->save();
        });
    }
}
