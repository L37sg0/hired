<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\Update;
use App\Models\Config;
use App\Models\JobBoard\Portfolio\Portfolio as Model;
use App\Models\JobBoard\Portfolio\PortfolioType;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Portfolio extends Controller
{
    public $path = 'portfolio';
    public $heroText = 'Portfolios';
    public $sloganText = 'List of All Portfolios';

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $path = $this->path;
        $heroText = $this->heroText;
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

    public function freelancers()
    {
        $path = $this->path;
        $heroText = 'Freelancers';
        $sloganText = 'List of Freelancer Portfolios';
        $collection = Model::where([
            Model::FIELD_PORTFOLIO_TYPE => PortfolioType::Freelancer
        ])->get();

        return view(Config::getTheme() . "$path.list", compact(
            'collection',
            'path',
            'heroText',
            'sloganText'
        ));
    }

    public function companies()
    {
        $path = $this->path;
        $heroText = 'Companies';
        $sloganText = 'List of Company Portfolios';
        $collection = Model::where([
            Model::FIELD_PORTFOLIO_TYPE => PortfolioType::Company
        ])->get();

        return view(Config::getTheme() . "$path.list", compact(
            'collection',
            'path',
            'heroText',
            'sloganText'
        ));
    }

    public function agencies()
    {
        $path = $this->path;
        $heroText = 'Agencies';
        $sloganText = 'List of Agency Portfolios';
        $collection = Model::where([
            Model::FIELD_PORTFOLIO_TYPE => PortfolioType::Agency
        ])->get();

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
     * @param $id
     * @return Application|Factory|View
     */
    public function myPortfolio()
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
    public function update(Update $request, $id)
    {
        $model = Model::find($id);

        if ($request->get('about')) {
            $model->fill([
                Model::FIELD_ABOUT => $request->get('about')
            ])->save();
        }

        Session::flash("success", __("messages.success.$this->path.updated"));

        return redirect(route("$this->path.list"));

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
