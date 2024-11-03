<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeEntry>
 */
class TimeEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $username = [
            'Amitav',
            'Jhon',
            'Michael',
            'James',
            'Robert',
            'William',
            'David',
            'Thomas',
            'Christopher',
            'Matthew',
            'Donald',
            'Andrew',
            'Edward',
            'Jason',
        ];
    
        $project = ['Youtube', 'Google Play', 'Vuejs', 'Twitter', 'MySQL Package', 'JSAlbum', 'Website'];
    
        return [
            'username' => fake()->randomElement($username),
            'project' => fake()->randomElement($project),
            'date' => fake()->dateTimeBetween('-6 months', 'now'),
            'time' => rand(1, 8),
        ];
    }
}
