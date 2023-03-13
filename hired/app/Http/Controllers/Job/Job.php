<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\Update;
use App\Models\Config;
use App\Models\JobBoard\Listing as Model;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;

class Job extends Controller
{
    public $path        = 'job';
    public $heroText    = 'Jobs';
    public $sloganText  = 'Find your next freelance project here.';

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request) {
        $path       = $this->path;
        $heroText   = $this->heroText;
        $sloganText = $this->sloganText;

        $collection = Model::Paginate(12);

        $search = $request->get('search');
        if ($search) {
            $collection = Model::search($search)->paginate(10);
        }

        return view(Config::getTheme() . "$path.list", compact(
                'collection',
                'path',
            'heroText',
            'sloganText'
        ));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function preview($id)
    {
        $model = Model::find($id);

        return view(Config::getTheme() . "$this->path.preview", compact('model'));
    }

    /**
     * @param Update $request
     * @return Application|RedirectResponse|Redirector
     */
    public function create(Update $request) {
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
    public function update(Update $request, $id) {
        $model = Model::find($id);

        $model->fill([])->save();

        Session::flash("success", __("messages.success.$this->path.updated"));

        return redirect(route("$this->path.list"));

    }

    /**
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id) {
        $model = Model::find($id);

        $model->delete();
        Session::flash("success", __("messages.success.$this->path.deleted"));

        return redirect(route("$this->path.list"));
    }

}
