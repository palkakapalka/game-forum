<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;

Route::get('/', function () {
    $posts = Post::all();
    $postsUser = Post::where('user_id', auth()->id())->get();
    return view('index',['posts'=>$posts ,'userPost'=>$postsUser]);
});

Route::get('/registration', [UserController::class, function(){
    return view('registration');
}]);
Route::get('/login', [UserController::class, function(){
    return view('login');
}]);
Route::get('/back', [UserController::class, function(){
    return view('index');
}]);
Route::get('/create_post', [UserController::class, function(){
    return view('create_post');
}]);

Route::post('/registration', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/create_post', [PostController::class, 'createPost']);
