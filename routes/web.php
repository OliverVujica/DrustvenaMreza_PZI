<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ObjavaController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Models\Komentar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');

Route::group([ 'prefix'=> 'objava','as'=>'objava.'], function () {

    Route::group(['middleware'=>['auth']], function() {
        Route::get('/{objava}/edit', [ObjavaController::class, 'edit'] )->name('edit');

        Route::put('/{objava}', [ObjavaController::class, 'update'] )->name('update');

        // prateci laravel dokumentaciju koristimo delete, objavu sa id, i destroy, sto sam laravel i predlaze
        Route::delete('/{id}', [ObjavaController::class, 'destroy'] )->name('destroy');

        Route::post('/{objava}/komentari', [KomentarController::class, 'store'] )->name('komentari.store');

    });

    // laravel dokumentacija za kontrolu, show za prikaz jedne objave
    Route::get('/{objava}', [ObjavaController::class, 'show'] )->name('show');

    Route::post('', [ObjavaController::class, 'store'] )->name('create');
}); 

Route::resource('users', KorisnikController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('profile', [KorisnikController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->name('users.follow')->middleware('auth');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('objave/{objava}/like', [PostLikeController::class, 'like'])->name('objave.like')->middleware('auth');
Route::post('objave/{objava}/dislike', [PostLikeController::class, 'dislike'])->middleware('auth')->name('objave.dislike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/about', function () {
    return view('about');
});

Route::get('/admin', [AdminDashboardController::class, 'index'] )->name('admin.dashboard')->middleware(['auth', 'can:admin']);

Route::get('/test', function () {
    return view('test');
});

Route::delete('/komentari/{komentar}', [KomentarController::class, 'destroy'] )->name('komentari.destroy')->middleware('auth');