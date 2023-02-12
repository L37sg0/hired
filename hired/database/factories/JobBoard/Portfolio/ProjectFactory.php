<?php

namespace Database\Factories\JobBoard\Portfolio;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobBoard\Portfolio\Project as Model;

class ProjectFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Model::class;

    /**
     * @inheritDoc
     */
    public function definition()
    {
        $images = [
            'https://colorlib.com/wp-content/uploads/sites/2/news-wordpress-themes-4.jpg',
            'https://www.typesofall.com/wp-content/uploads/1/Website.png',
            'https://cdn.wpbeginner.com/wp-content/uploads/2021/09/wp-blog-example.png',
            'https://content-management-files.canva.com/cdn-cgi/image/f=auto,q=70/19530c36-6df2-481a-bde1-d1495547282c/howto_websites2.png',
            'https://zyro.com/cdn-cgi/image/w=970,q=95,f=auto/images/websitePersonal/hero.png',
            'https://colorlib.com/wp/wp-content/uploads/sites/2/5_landscaping-website-design.jpg',
            'https://du-cdn.cdn-website.com/duda_website/images/social/thumb.jpg',
            'https://assets.justinmind.com/wp-content/uploads/2021/11/services-web-design-portfolio-template.png',
            'https://essentialwebapps.com/wp-content/uploads/2020/05/EWA-Personal-Website-02-1024x499.jpg',
            'https://barn2.com/wp-content/uploads/2017/04/WordPress-password-protected-portfolio-770x437.jpg'
        ];

        $imageUrl = $images[array_rand($images)];

        return [
            Model::FIELD_TITLE          => 'Website for ' . $this->faker->company,
            Model::FIELD_DESCRIPTION    => $this->faker->sentence(10, true),
            Model::FIELD_IMAGE_URL      => $imageUrl,
        ];
    }
}
