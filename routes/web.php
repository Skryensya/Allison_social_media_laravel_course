<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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
    /*
    $images = Image::all();
    foreach($images as $image){
        echo $image->image_path."<br/>";
        echo $image->description."<br/>";
        echo $image->user->name.' '.$image->user->surname."<br/>";

        if(count($image->comments) >= 1){
        echo '<strong>Comentarios</strong><br/>';
        foreach($image->comments as $comment){
            echo $image->user->name.' '.$image->user->surname.':<br/>'.$comment->content.'<br/>';
        }
    }
        Echo 'LIKES: '.count($image->likes);
        echo "<hr/>";
    }
    DIE(); 
    */
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/configuracion', [UserController::class, 'config'])->name('config');
Route::post('/user/edit', [UserController::class, 'update'])->name('user.update');
Route::get('/user/avatar/{filename?}', [UserController::class, 'getImage'])->name('user.avatar');
Route::get('/subir-imagen', [ImageController::class, 'create'] )->name('image.create');
Route::post('/image/save', [ImageController::class, 'save'])->name('image.save');
Route::get('/image/file/{filename?}', [imageController::class, 'getImage'])->name('image.file');
Route::get('/image/detalle/{id}', [imageController::class, 'detail'])->name('image.detail');

Route::post('/comment/save', [CommentController::class, 'save'])->name('comment.save');
Route::get('/comment/delete/{id}', [commentController::class, 'delete'])->name('comment.delete');
Route::get('/like/{image_id}', [LikeController::class, 'like'])->name('like.save');
Route::get('/dislike/{image_id}', [LikeController::class, 'dislike'])->name('like.delete');
Route::get('/likes', [LikeController::class, 'index'] )->name('like.index');
Route::get('/perfil/{id}', [userController::class, 'profile'] )->name('user.profile');


Route::get('/image/delete/{id}', [imageController::class, 'delete'])->name('image.delete');
Route::get('/image/editar/{id}', [imageController::class, 'edit'])->name('image.edit');
Route::post('/image/update', [imageController::class, 'update'])->name('image.update');
