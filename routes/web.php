<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Comment\commentPostController;
use App\Http\Controllers\Like\likePostController;

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
投稿機能
*/
Route::get('/comments',[commentPostController::class,'index'])->name('comment.index');
Route::get('/comments/{post}',[commentPostController::class,'show']);
Route::post('/comments',[commentPostController::class,'store']);
Route::delete('/comments/delete/{post}',[commentPostController::class,'destroy']);
Route::post('/post/comment/{post}',[commentPostController::class,'comment']);

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
Route::get('/follows',[followUserController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
