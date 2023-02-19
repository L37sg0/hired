<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\Update;
use App\Models\Config;
use App\Models\JobBoard\Portfolio\Portfolio as Model;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
     * @param Update $request
     * @return Application|RedirectResponse|Redirector
     */
    public function create(Update $request)
    {
        $model = new Model();

        $model->fill([])->save();

        Session::flash("success", __("messages.success.$this->path.created"));

        return redirect(route("$this->path.list"));
    }

    /**
     * @param Update $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function updateAbout(Update $request)
    {
        /** @var User $user */
        $user = User::find(Auth::id());
        $model = $user->getAttribute(User::$REL_PORTFOLIO);

        $model->fill([
            Model::FIELD_ABOUT => $request->get('about')
        ])->save();

        return redirect(route("user.$this->path.preview"));
    }

    /**
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $model = Model::find($id);

        $model->delete();
        Session::flash("success", __("messages.success.$this->path.deleted"));

        return redirect(route("$this->path.list"));
    }

}
