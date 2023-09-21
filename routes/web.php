<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileController as ProfileOfAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Comment\commentPostController;
use App\Http\Controllers\Like\likePostController;
use App\Http\Controllers\User\userFollowController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('perfect');
});

/*
コメント機能
*/
Route::get('/comments',[commentPostController::class,'index'])->name('comment.index');
Route::get('/comments/{post}',[commentPostController::class,'show']);
Route::post('/comments',[commentPostController::class,'store']);
Route::delete('/comments/delete/{post}',[commentPostController::class,'destroy']);
Route::post('/post/comment/{post}',[commentPostController::class,'comment']);
Route::post('/reply/{post}/{comment}',[commentPostController::class,'reply']);

/*
いいね機能
*/
Route::get('/likes',[likePostController::class,'index']);
Route::post('/likes/post',[likePostController::class,'store']);
Route::delete('/delete/post/{post}',[likePostController::class,'destroy']);
//{post}でインスタンス変数$postのidを取得
Route::post('/like/{post}',[likePostController::class,'like']);
Route::delete('/unlike/{post}',[likePostController::class,'unlike']);

/*
フォロー機能
*/
Route::get('/follows',[userFollowController::class,'index']);
//ルートパラメータにはコントローラに渡す必要があるフォローされる人のidが入る。
Route::post('/follow/{user}',[userFollowController::class,'follow']);
Route::post('/unfollow/{user}',[userFollowController::class,'unfollow']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//adminルート
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/admin.php';
});

require __DIR__.'/auth.php';
