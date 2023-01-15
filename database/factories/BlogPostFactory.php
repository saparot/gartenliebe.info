<?php

namespace Database\Factories;

use App\Enums\BlogPostStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition () {
        $statusList = [
            BlogPostStatus::STATUS_UNPUBLISHED,
            BlogPostStatus::STATUS_PUBLISHED,
            BlogPostStatus::STATUS_PREVIEW,
        ];

        return [
            'title_DE' => fake()->sentence(),
            'content_DE' => fake()->realText(),
            'status' => $statusList[array_rand($statusList)],
            'seo_keywords' => fake()->text(300),
        ];
    }
}
