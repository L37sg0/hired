<?php

namespace Database\Factories\JobBoard\Portfolio;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobBoard\Portfolio\Portfolio as Model;

class PortfolioFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Model::class;

    /**
     * @return array|mixed[]
     */
    public function definition()
    {
        $avatars = [
            'https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg',
            'https://cdn3.vectorstock.com/i/1000x1000/30/97/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg',
            'https://img.freepik.com/premium-vector/female-user-profile-avatar-is-woman-character-screen-saver-with-emotions_505620-617.jpg',
            'https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png',
            'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png',
            'https://whatsondisneyplus.com/wp-content/uploads/2021/12/merida-avatar-wodp.png',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6nofeFZqVKlUr6DiQ7mu4v7X3WdprTUPe1Q&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2WWJEImdtBVeLhMDBgSTAfvvju5KltNqo2A&usqp=CAU',
            'https://newprofilepic2.photo-cdn.net//assets/images/article/profile.jpg',
            'https://image.winudf.com/v2/image1/Y29tLm1uaWRlbmMuYXZ0YXJtYWtlcl9zY3JlZW5fNF8xNTU0NjQ5MzE4XzAwMw/screen-4.jpg?fakeurl=1&type=.webp'
        ];

        $avatar = $avatars[array_rand($avatars)];

        return [
            Model::FIELD_AVATAR_URL => $avatar,
            Model::FIELD_ABOUT      => $this->faker->text(1000)
        ];
    }
}
