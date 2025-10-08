<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Version>
 */
class VersionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = $this->faker->paragraphs(3, true);

        return [
            'document_id' => Document::factory(),
            'version_number' => 1,
            'content' => $content,
            'created_by' => User::factory(),
            'hash' => hash('sha256', $content),
            'comment' => $this->faker->sentence(),
        ];
    }
}
