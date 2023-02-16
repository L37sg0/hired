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
use App\Models\JobBoard\Portfolio\PortfolioType;
use App\Models\JobBoard\Portfolio\Project;
use App\Models\JobBoard\Tag;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
         * Administrator
         */
        $this->createAdministrator();

        /**
         * Companies
         */
        $this->createUsersWithRole(Role::Company, $tags, 20);

        /**
         * Freelancers
         */
        $this->createUsersWithRole(Role::Freelancer, $tags, 20);

        /**
         * Agencies
         */
        $this->createUsersWithRole(Role::Agency, $tags, 20);
    }

    /**
     * @param Role $role
     * @param $tags
     * @param int $nmbUsers
     * @return void
     */
    public function createUsersWithRole(Role $role, $tags, int $nmbUsers) {

        User::factory($nmbUsers)->create([
            User::FIELD_ROLE => $role
        ])->each(function ($user) use ($tags, $role) {

            if ($role !== Role::Freelancer) {
                $this->createListings($user, $tags);
            }

            if ($role !== Role::Company) {
                $this->createGigs($user, $tags);
            }

            $this->createPortfolio($user);

        })->each(function ($user) {
            $this->createPortfolioParts($user);
        });
    }

    /**
     * @return void
     */
    public function createAdministrator() {
        $user = new User();
        $user->fill([
            User::FIELD_NAME                => 'Administrator',
            User::FIELD_EMAIL               => 'admin@admin.bg',
            User::FIELD_EMAIL_VERIFIED_AT   => Carbon::today(),
            User::FIELD_PASSWORD            => Hash::make('password'),
            User::FIELD_REMEMBER_TOKEN      => '',
            User::FIELD_ROLE                => Role::Administrator,
        ])->save();

        $portfolio = Portfolio::factory()->create([
            Portfolio::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID),
            Portfolio::FIELD_PORTFOLIO_TYPE => PortfolioType::Agency
        ]);

        Experience::factory(3)->create([
            Experience::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
        ]);

        Project::factory(3)->create([
            Project::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
        ]);
    }

    /**
     * @param User $user
     * @param $tags
     * @return void
     */
    public function createListings(User $user, $tags) {

        Listing::factory(rand(1, 4))->create([
            /** @var User $user */
            Listing::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID)
        ])->each(function ($listing) use ($tags) {
            /** @var Listing $listing */
            $listing->tags()->attach($tags->random(2));
        });
    }

    /**
     * @param User $user
     * @param $tags
     * @return void
     */
    public function createGigs(User $user, $tags) {

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
    }

    /**
     * @param User $user
     * @return void
     */
    public function createPortfolio(User $user) {

        Portfolio::factory()->create([
            Portfolio::FIELD_USER_ID => $user->getAttribute(User::FIELD_ID),
            Portfolio::FIELD_PORTFOLIO_TYPE => $user->getAttribute(User::FIELD_ROLE)->value
        ]);
    }

    /**
     * @param User $user
     * @return void
     */
    public function createPortfolioParts(User $user) {

        /** @var Portfolio $portfolio */
        $portfolio = $user->getAttribute(User::$REL_PORTFOLIO);

        Experience::factory(rand(1, 5))->create([
            Experience::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
        ]);

        Project::factory(rand(2, 4))->create([
            Project::FIELD_PORTFOLIO_ID => $portfolio->getAttribute(Portfolio::FIELD_ID)
        ]);
    }
}
