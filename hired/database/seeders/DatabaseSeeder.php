<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\JobBoard\Gig\Gig;
use App\Models\JobBoard\Gig\GigPrice;
use App\Models\JobBoard\Gig\GigPriceOption;
use App\Models\JobBoard\Listing;
use App\Models\JobBoard\Portfolio\Contact;
use App\Models\JobBoard\Portfolio\Experience;
use App\Models\JobBoard\Portfolio\Portfolio;
use App\Models\JobBoard\Portfolio\Project;
use App\Models\JobBoard\Tag;
use App\Models\Role;
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

        /**
         * Companies
         */
        User::factory(20)->create([
            User::FIELD_ROLE => Role::Company
        ])->each(function ($user) use ($tags) {

            /** @var User $user */
            Listing::factory(rand(1, 4))->create([
                /** @var User $user */
                Listing::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID)
            ])->each(function ($listing) use ($tags) {
                /** @var Listing $listing */
                $listing->tags()->attach($tags->random(2));
            });

            Portfolio::factory()->create([
                Portfolio::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID),
                Portfolio::FIELD_PORTFOLIO_TYPE => $user->getAttribute(User::FIELD_ROLE)->value
            ]);

        })->each(function ($user) {
            /** @var Portfolio $portfolio */
            $portfolio = $user->getAttribute(User::$REL_PORTFOLIO);
            Experience::factory(rand(1, 5))->create([
                Experience::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
            ]);

            Project::factory(rand(2, 4))->create([
                Project::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
            ]);
        });

        /**
         * Freelancers
         */
        User::factory(20)->create([
            User::FIELD_ROLE => Role::Freelancer
        ])->each(function ($user) use ($tags) {

            /** @var User $user */
            Gig::factory(rand(1, 3))->create([
                Gig::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID)
                /** @var Gig $gig */
            ])->each(function ($gig) use ($tags) {
                /** @var Gig $gig */
                $gig->tags()->attach($tags->random(rand(2, 5)));
            })->each(function ($gig) {
                /** @var Gig $gig */
                GigPrice::factory()->create([
                    GigPrice::FIELD_GIG_ID => $gig->getAttribute(Gig::FIELD_ID)
                ]);
            })->each(function ($gig) {
                foreach ($gig->prices as $gigPrice) {
                    GigPriceOption::factory(rand(1, 4))->create([
                        GigPriceOption::FIELD_GIG_PRICE_ID => $gigPrice->id
                    ]);
                }
            });

            Portfolio::factory()->create([
                Portfolio::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID),
                Portfolio::FIELD_PORTFOLIO_TYPE => $user->getAttribute(User::FIELD_ROLE)->value
            ]);

        })->each(function ($user) {
            /** @var Portfolio $portfolio */
            $portfolio = $user->getAttribute(User::$REL_PORTFOLIO);
            Experience::factory(rand(1, 5))->create([
                Experience::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
            ]);

            Project::factory(rand(2, 4))->create([
                Project::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
            ]);
        });

        /**
         * Agencies
         */
        User::factory(20)->create([
            User::FIELD_ROLE => Role::Agency
        ])->each(function ($user) use ($tags) {

            /** @var User $user */
            Listing::factory(rand(1, 4))->create([
                /** @var User $user */
                Listing::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID)
            ])->each(function ($listing) use ($tags) {
                /** @var Listing $listing */
                $listing->tags()->attach($tags->random(2));
            });

            Gig::factory(rand(1, 3))->create([
                Gig::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID)
                /** @var Gig $gig */
            ])->each(function ($gig) use ($tags) {
                /** @var Gig $gig */
                $gig->tags()->attach($tags->random(rand(2, 5)));
            })->each(function ($gig) {

                /** @var Gig $gig */
                GigPrice::factory()->create([
                    GigPrice::FIELD_GIG_ID => $gig->getAttribute(Gig::FIELD_ID)
                ]);

            })->each(function ($gig) {
                foreach ($gig->prices as $gigPrice) {
                    GigPriceOption::factory(rand(1, 4))->create([
                        GigPriceOption::FIELD_GIG_PRICE_ID => $gigPrice->id
                    ]);
                }
            });

            Portfolio::factory()->create([
                Portfolio::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID),
                Portfolio::FIELD_PORTFOLIO_TYPE => $user->getAttribute(User::FIELD_ROLE)->value
            ]);

        })->each(function ($user) {
        /** @var Portfolio $portfolio */
            $portfolio = $user->getAttribute(User::$REL_PORTFOLIO);
            Experience::factory(rand(1, 5))->create([
                Experience::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
            ]);

            Project::factory(rand(2, 4))->create([
                Project::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
            ]);
        });
    }
}
