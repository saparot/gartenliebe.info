<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\StaticPageContent;
use App\Models\User;
use Database\Factories\StaticPageContentFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run (): void {
        /*****  User ******/
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory(10)->create();
        BlogPost::factory(30)->create();
        StaticPageContent::factory(StaticPageContentFactory::getSeederCount())->create();
    }
}
