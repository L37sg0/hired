<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\JobBoard\Gig\Gig;
use App\Models\JobBoard\Gig\GigPrice;
use App\Models\JobBoard\Gig\GigPriceOption;
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

            Gig::factory(rand(1,3))->create([
                Gig::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID)
            /** @var Gig $gig */
            ])->each(function($gig) use ($tags) {
                $gig->tags()->attach($tags->random(rand(2,5)));
            })->each(function ($gig) {
                GigPrice::factory()->create([
                    GigPrice::FIELD_GIG_ID => $gig->id
                ]);
            })->each(function ($gig) {
                foreach ($gig->prices as $gigPrice) {
                    GigPriceOption::factory(rand(1, 4))->create([
                        GigPriceOption::FIELD_GIG_PRICE_ID => $gigPrice->id
                    ]);
                }
            });
        });
    }
}
