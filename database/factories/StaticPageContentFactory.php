<?php

namespace Database\Factories;

use App\Models\StaticPageContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StaticPageContent>
 */
class StaticPageContentFactory extends Factory {

    private static $list = [
        [
            'identifier' => 'imprintAddress',
            'content' => "Max Mustermann\nRosenweg 33\n\n12345 Blumenstadt",
        ],
        [
            'identifier' => 'imprintPhone',
            'content' => "+49 123 456 789 0",
        ],
        [
            'identifier' => 'imprintEmail',
            'content' => "example@example.org",
        ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition () {
        $record = array_pop(self::$list);

        return [
            'identifier' => $record['identifier'],
            'content' => $record['content'],
        ];
    }

    public static function getSeederCount (): int {
        return count(self::$list);
    }
}
