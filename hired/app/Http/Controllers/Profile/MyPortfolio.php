<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\JobBoard\Portfolio\Portfolio as Model;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class MyPortfolio extends Controller
{
    public $path = 'portfolio';

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function preview()
    {
        /** @var User $user */
        $user = User::find(Auth::id());
        $model = $user->getAttribute(User::$REL_PORTFOLIO);

        return view(Config::getTheme() . "$this->path.edit", compact('model'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function updateAbout(Request $request)
    {
        /** @var User $user */
        $user = User::find(Auth::id());
        $model = $user->getAttribute(User::$REL_PORTFOLIO);

        $model->fill([
            Model::FIELD_ABOUT => $request->get('about')
        ])->save();

        return redirect(route("user.$this->path.preview"));
    }

    public function updateAvatar(Request $request) {

        /** @var User $user */
        $user = User::find(Auth::id());
        $model = $user->getAttribute(User::$REL_PORTFOLIO);

        $oldAvatar = $model->getAttribute(Model::FIELD_AVATAR_URL) ?? null;

        $userId = $user->getAttribute(User::FIELD_ID);
        $newAvatar = $request->file('avatar')->storePublicly("public/avatars/$userId");
        if ($newAvatar) {
            $model->fill([
                Model::FIELD_AVATAR_URL => str_replace('public', '/storage', $newAvatar)
            ])->save();
        }

        if ($oldAvatar) {
            // find old avatar on filesystem and delete it
        }

        return redirect(route("user.$this->path.preview"));
    }

    public function updateExperiences(Request $request) {

    }

    public function updateProjects(Request $request) {

    }

}
