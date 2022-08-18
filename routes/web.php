<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\Blog\FoodblogController;
use App\Http\Controllers\ShoppingcartController;
use App\Http\Controllers\SignoutController;
use App\Http\Controllers\Blog\AddrecipeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Blog\RegisterinblogController;
use App\Http\Controllers\Blog\ShowfullrecipeController;
use App\Http\Controllers\TrialController;
use App\Http\Controllers\NotebookController;
use App\Http\Controllers\Blog\EditrecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompetitionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'show'])->name('about');

Route::get('/recipes', [RecipeController::class, 'toprated'])->name('recipes');

Route::get('/loginform', [LoginController::class, 'show']);
Route::post('/loginform', [LoginController::class, 'checklogin']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('store', [SignupController::class, 'store']);

Route::get('/signout', [SignoutController::class, 'perform']);

Route::get('foodblog.check', [FoodblogController::class, 'check']);
Route::get('foodblog.showrecipe', [FoodblogController::class, 'showrecipe']);
Route::get('foodblog.show', [FoodblogController::class, 'show']);
Route::get('/foodblog', [FoodblogController::class, 'showr']);

Route::get('/shopping_cart/shoppingcart', [ShoppingcartController::class, 'index']);
Route::get('/shopping_cart/addintocart', [ShoppingcartController::class, 'form']);
Route::post('/shopping_cart/addintocart.add', [ShoppingcartController::class, 'add']);
Route::get('/shopping_cart/delete/{id?}', [ShoppingcartController::class, 'delete']);

Route::get('/addrecipe', [AddrecipeController::class, 'show']);
Route::post('recipeinsert', [AddrecipeController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard.like/{id?}', [DashboardController::class, 'like']);
Route::get('/dashboard.dislike/{id?}', [DashboardController::class, 'dislike']);
Route::post('dashboard.search', [RecipeController::class, 'searchbybox']);

Route::get('/searchresultshow', function(){
    return view('searchresultshow');
});

Route::get('/registerinblog', [RegisterinblogController::class, 'show']);
Route::post('register', [RegisterinblogController::class, 'register']);

Route::get('/editrecipeform/{id?}', [EditrecipeController::class, 'check_id']);
Route::get('editrecipeform', [EditrecipeController::class, 'show']);
Route::get('/restriction', [EditrecipeController::class, 'restriction']);
Route::post('/editform/{id?}', [EditrecipeController::class, 'edit']);

Route::get('/showfullrecipe.showid/{id?}', [ShowfullrecipeController::class, 'showid']);
Route::get('/deleterecipe/{id?}', [EditrecipeController::class, 'delete_recipe']);

Route::get('notebook/show', [NotebookController::class, 'index']);
Route::get('notebook/view/{id?}', [NotebookController::class, 'view']);
Route::get('notebook/create', [NotebookController::class, 'show']);
Route::post('notebook/note.create', [NotebookController::class, 'create']);
Route::get('notebook/edit_fetch/{id?}', [NotebookController::class, 'editfetch']);
Route::post('notebook/note.edit/{id?}', [NotebookController::class, 'edit']);
Route::get('notebook/delete/{id?}', [NotebookController::class, 'delete']);

Route::get('profile', [ProfileController::class, 'index']);
Route::get('profileeditform', [ProfileController::class, 'editshow']);
Route::post('profileedit', [ProfileController::class, 'edit_form']);

Route::get('favorite', [ProfileController::class, 'favoritelist']);
Route::get('favorite.add/{id?}', [ProfileController::class, 'add']);
Route::get('unfavorite/{id?}', [ProfileController::class, 'unfavorite_recipe']);
Route::get('toprated.show', [DashboardController::class, 'toprated']);

Route::get('competition/form', [CompetitionController::class, 'show']);
Route::post('competition/competition.register', [CompetitionController::class, 'store']);
Route::get('competition/result', [CompetitionController::class, 'result']);
Route::get('competition/profileshow/{email?}', [CompetitionController::class, 'profileshow']);

?>
