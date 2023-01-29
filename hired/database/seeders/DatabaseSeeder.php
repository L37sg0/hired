<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\JobBoard\Listing;
use App\Models\JobBoard\Tag;
use App\Models\User;
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
        $tags = Tag::factory(10)->create();

        User::factory(20)->create()->each(function ($user) use($tags) {
            Listing::factory(rand(1,4))->create([
                /** @var User $user */
                Listing::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID)
            ])->each(function ($listing) use($tags) {
                /** @var Listing $listing */
                $listing->tags()->attach($tags->random(2));
            });
        });
    }
}
