<?php

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
    return redirect(\route('job.list'));
});
/**
 * Job routes
 */
Route::group(['as' => 'job.', 'prefix' => 'jobs'], static function() {
    Route::match(['get', 'post'], '', [Job::class, 'index'])->name('list');
    Route::get('preview/{job}',[Job::class, 'preview'])->name('preview');
    Route::post('create', [Job::class, 'create'])->name('create');
    Route::post('update/{job}', [Job::class, 'update'])->name('update');
    Route::post('delete/{job}', [Job::class, 'destroy'])->name('delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Profile::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Profile::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Profile::class, 'destroy'])->name('profile.destroy');

    // Listing
    Route::group(['prefix' => 'listings', 'as' => 'listings.'], static function() {
        Route::match(['get','post'], '', [Jobs::class, 'index'])->name('list');
    });
});

require __DIR__.'/auth.php';
