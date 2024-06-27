<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;

Route::get('/', function () {
    $posts = Post::all();
    $postsUser = Post::where('user_id', auth()->id())->get();
    return view('index',['posts'=>$posts ,'userPost'=>$postsUser]);
});

Route::get('/registration', [UserController::class, function(){
    return view('registration');
}]);

Route::get('/admin', function(){
    $posts = Post::all();
    return view('admin-post', ['posts'=>$posts]);
});
Route::get('/admin-users', function(){
    $users = User::all();
    return view('admin-users', ['users'=>$users]);
});


Route::get('/admin-urers', function(){
    return view('admin-users');
});
Route::get('/login', [UserController::class, function(){
    return view('login');
}]);

Route::get('/create_post', [UserController::class, function(){
    return view('create_post');
}]);

Route::post('/registration', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/create_post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

Route::get('/edit-users/{user}', [UserController::class, 'showEditScreenUser']);
Route::put('/edit-user/{user}', [UserController::class, 'updateuser']);
Route::delete('/delete-user/{user}', [UserController::class, 'deleteUser']);

Route::get('/view-post/{post}', [PostController::class, 'showPostScreen']);
