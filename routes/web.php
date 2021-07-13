<?php

use Illuminate\Support\Facades\Route;

use App\Models\Medicine;
use App\Models\Post;


// Website Controllers
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\Website\BlogController;




// Dashboard Controllers

use App\Http\Controllers\BrandController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\SaltController;
use App\Http\Controllers\PostController;

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

Route::get('/', [HomePageController::class , 'index' ])->name('homepage');

Route::get('/drug/{medicine:slug}', [HomePageController::class , 'singlePage' ])->name('single-page');

Auth::routes();


Route::group(['middleware' => 'auth' , 'prefix' => 'admin'], function () {
    Route::resource( 'brand', BrandController::class );
    Route::resource( 'medicine', MedicineController::class);
    Route::resource( 'symptom', SymptomController::class , ['except' => [
        'update'
    ]]);
    Route::resource( 'salt', SaltController::class , ['except' => [
        'update'
    ]]);

    Route::post('image_upload' , [PostController::class  , 'uploadImage'])->name('admin.image_upload');


    Route::resource( 'post' , PostController::class);

    Route::post('salt/{id}', [SaltController::class , 'update'])->name('salt.update');
    Route::post('symptom/{id}', [SymptomController::class , 'update'])->name('symptom.update');

});


Route::prefix('blog')->group(function () {
    Route::get('/',[PostController::class , 'latest'])->name('blog');
    Route::get('/{id}' ,[PostController::class , 'singlePost'])->name('blog.show');
});


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
