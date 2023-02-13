<?php

use App\Http\Controllers\Gig\Gig;
use App\Http\Controllers\Job\Job;
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
/**
 * Job routes
 */
Route::group(['as' => 'job.', 'prefix' => 'jobs'], static function () {
    Route::match(['get', 'post'],'', [Job::class, 'index'])->name('list');
    Route::middleware('auth')->group(function () {
        Route::get('preview/{job}', [Job::class, 'preview'])->name('preview');
        Route::post('create', [Job::class, 'create'])->name('create');
        Route::post('update/{job}', [Job::class, 'update'])->name('update');
        Route::post('delete/{job}', [Job::class, 'destroy'])->name('delete');});
});

/**
 * Gig routes
 */
Route::group(['as' => 'gig.', 'prefix' => 'gigs'], static function () {
    Route::match(['get', 'post'], '', [Gig::class, 'index'])->name('list');
    Route::middleware('auth')->group(function () {
        Route::get('preview/{gig}', [Gig::class, 'preview'])->name('preview');
        Route::post('create', [Gig::class, 'create'])->name('create');
        Route::post('update/{gig}', [Gig::class, 'update'])->name('update');
        Route::post('delete/{gig}', [Gig::class, 'destroy'])->name('delete');
    });
});

/**
 * Portfolio routes
 */
Route::group(['as' => 'portfolio.', 'prefix' => 'portfolios'], static function () {
    Route::middleware('auth')->group(function () {
        Route::group(['as' => 'freelancer.', 'prefix' => 'freelancers'], function () {
            Route::match(['get', 'post'], '', [Job::class, 'index'])->name('list');
            Route::get('preview/{portfolio}', [Job::class, 'preview'])->name('preview');
            Route::post('create', [Job::class, 'create'])->name('create');
            Route::post('update/{portfolio}', [Job::class, 'update'])->name('update');
            Route::post('delete/{portfolio}', [Job::class, 'destroy'])->name('delete');
        });
        Route::group(['as' => 'company.', 'prefix' => 'companies'], function () {
            Route::match(['get', 'post'], '', [Job::class, 'index'])->name('list');
            Route::get('preview/{portfolio}', [Job::class, 'preview'])->name('preview');
            Route::post('create', [Job::class, 'create'])->name('create');
            Route::post('update/{portfolio}', [Job::class, 'update'])->name('update');
            Route::post('delete/{portfolio}', [Job::class, 'destroy'])->name('delete');
        });
        Route::group(['as' => 'agency.', 'prefix' => 'agencies'], function () {
            Route::match(['get', 'post'], '', [Job::class, 'index'])->name('list');
            Route::get('preview/{portfolio}', [Job::class, 'preview'])->name('preview');
            Route::post('create', [Job::class, 'create'])->name('create');
            Route::post('update/{portfolio}', [Job::class, 'update'])->name('update');
            Route::post('delete/{portfolio}', [Job::class, 'destroy'])->name('delete');
        });
        Route::match(['get', 'post'], '', [Job::class, 'index'])->name('list');
        Route::get('preview/{portfolio}', [Job::class, 'preview'])->name('preview');
        Route::post('create', [Job::class, 'create'])->name('create');
        Route::post('update/{portfolio}', [Job::class, 'update'])->name('update');
        Route::post('delete/{portfolio}', [Job::class, 'destroy'])->name('delete');
    });
});

/**
 * User routes
 */
Route::group(['as' => 'user.', 'prefix' => 'user'], static function () {
    /**
     * User portfolio
     */
    Route::group(['as' => 'portfolio.', 'prefix' => 'portfolio'], static function () {
        Route::match(['get', 'post'], '', [Job::class, 'index'])->name('list');
        Route::get('preview', [Job::class, 'preview'])->name('preview');
        Route::post('create', [Job::class, 'create'])->name('create');
        Route::post('update/{portfolio}', [Job::class, 'update'])->name('update');
        Route::post('delete/{portfolio}', [Job::class, 'destroy'])->name('delete');
    });
    /**
     * User profile
     */
    Route::group(['as' => 'profile', 'prefix' => 'profile'], static function () {
        Route::get('', [Profile::class, 'edit'])->name('profile.edit');
        Route::patch('', [Profile::class, 'update'])->name('profile.update');
        Route::delete('', [Profile::class, 'destroy'])->name('profile.destroy');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});

require __DIR__.'/auth.php';
