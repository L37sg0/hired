<?php

use App\Http\Controllers\Gig\Gig;
use App\Http\Controllers\Job\Job;
use App\Http\Controllers\Portfolio\Portfolio;
use App\Http\Controllers\Profile\MyPortfolio;
use App\Http\Controllers\Profile\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'],'/', function () {
    return redirect(route('job.list'));
});




Route::middleware('auth')->group(function() {
    /**
     * Job routes
     */
    Route::group(['as' => 'job.', 'prefix' => 'jobs'], static function () {
        Route::get('', [Job::class, 'index'])->name('list');
        Route::get('preview/{job}', [Job::class, 'preview'])->name('preview');
        Route::post('create', [Job::class, 'create'])->name('create');
        Route::post('update/{job}', [Job::class, 'update'])->name('update');
        Route::post('delete/{job}', [Job::class, 'destroy'])->name('delete');
    });

    /**
     * Gig routes
     */
    Route::group(['as' => 'gig.', 'prefix' => 'gigs'], static function () {
        Route::get('', [Gig::class, 'index'])->name('list');
        Route::get('preview/{gig}', [Gig::class, 'preview'])->name('preview');
        Route::post('create', [Gig::class, 'create'])->name('create');
        Route::post('update/{gig}', [Gig::class, 'update'])->name('update');
        Route::post('delete/{gig}', [Gig::class, 'destroy'])->name('delete');
    });

    /**
     * User routes
     */
    Route::group(['as' => 'user.', 'prefix' => 'user'], static function () {
        /**
         * User portfolio
         */
        Route::group(['as' => 'portfolio.', 'prefix' => 'portfolio'], static function () {
            Route::get('preview', [MyPortfolio::class, 'preview'])->name('preview');
            Route::post('create', [MyPortfolio::class, 'create'])->name('create');
            Route::group(['as' => 'update.', 'prefix' => 'update'], static function () {
                Route::post('about', [MyPortfolio::class, 'updateAbout'])->name('about');
                Route::post('avatar', [MyPortfolio::class, 'updateAvatar'])->name('avatar');
            });
        });
        /**
         * User profile
         */
        Route::group(['as' => 'profile.', 'prefix' => 'profile'], static function () {
            Route::get('', [Profile::class, 'edit'])->name('edit');
            Route::patch('', [Profile::class, 'update'])->name('update');
            Route::delete('', [Profile::class, 'destroy'])->name('destroy');
        });
    });

    /**
     * Portfolio routes
     */
    Route::group(['as' => 'portfolio.', 'prefix' => 'portfolios'], static function () {
        Route::group(['as' => 'freelancer.', 'prefix' => 'freelancers'], function () {
            Route::get('', [Portfolio::class, 'freelancers'])->name('list');
        });
        Route::group(['as' => 'company.', 'prefix' => 'companies'], function () {
            Route::get('', [Portfolio::class, 'companies'])->name('list');
        });
        Route::group(['as' => 'agency.', 'prefix' => 'agencies'], function () {
            Route::get('', [Portfolio::class, 'agencies'])->name('list');
        });
        Route::match(['get'], '', [Portfolio::class, 'index'])->name('list');
        Route::get('preview/{portfolio}', [Portfolio::class, 'preview'])->name('preview');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});

require __DIR__.'/auth.php';
