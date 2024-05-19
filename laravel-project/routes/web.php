<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\EconomyController;
use App\Http\Controllers\InternationalController;
use App\Http\Controllers\PoliticsController;
use App\Http\Controllers\SocialController;

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

// 認証
Route::get('/register', [UserController::class, 'register'])->name('auth.register');
Route::get('/login', [UserController::class, 'login'])->name('auth.login');

// トップ
Route::get('/', [TopController::class, 'index'])->name('index.index');
Route::get('/create', [TopController::class, 'create'])->name('index.create');

// お問い合わせ
Route::get('/contact', [ContactController::class, 'index'])->name('contact.contact');
Route::get('/confirmation', [ContactController::class, 'confirmation'])->name('contact.confirmation');
Route::get('/thank', [ContactController::class, 'thank'])->name('contact.thank');

// マイページ
Route::get('/mypage', [MypageController::class, 'index'])->name('mypage.index');
Route::get('/mypage/nickname', [MypageController::class, 'nickname'])->name('mypage.nickname');
Route::get('/mypage/bookmark', [MypageController::class, 'bookmark'])->name('mypage.bookmark');
Route::get('/mypage/post', [MypageController::class, 'post'])->name('mypage.post');

// 政治
Route::get('/politics', [PoliticsController::class, 'index'])->name('politics.index');
Route::get('/politics/show', [PoliticsController::class, 'show'])->name('politics.show');
// 経済
Route::get('/economy', [EconomyController::class, 'index'])->name('economy.index');
Route::get('/economy/show', [EconomyController::class, 'show'])->name('economy.show');
// 国際
Route::get('/international', [InternationalController::class, 'index'])->name('international.index');
Route::get('/international/show', [InternationalController::class, 'show'])->name('international.show');
// 社会
Route::get('/social', [SocialController::class, 'index'])->name('social.index');
Route::get('/social/show', [SocialController::class, 'show'])->name('social.show');




// Route::get('/', function () {
//     return view('welcome');
// });
