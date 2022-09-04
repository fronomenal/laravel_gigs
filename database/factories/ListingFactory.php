<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */

    private $skills = ["devops", "fronte-end", "back-end", "testing", "cybersecurity"];
    private $langs = ["javascript", "php", "html", "css", "c#", "golang", "c++", "rust"];
    private $frames = ["symphony", "fast-api", "gin", "flask", "drupal", "react", "vue", "angular", "svelte", "pheonix", "elixir", "asp.net", "qt"];

    public function definition(){


        return [
            "title" => $this->faker->sentence(),
            "tags" => "{$this->skills[array_rand($this->skills)]}|{$this->langs[array_rand($this->langs)]}|{$this->frames[array_rand($this->frames)]}",
            "company" => $this->faker->company(),
            "email" => $this->faker->companyEmail(),
            "website" => $this->faker->url(),
            "location" => $this->faker->city(),
            "description" => $this->faker->paragraph(5)
        ];
    }
}
