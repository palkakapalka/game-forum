<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    $posts = Post::all();
    $postsUser = Post::where('user_id', auth()->id())->get();
    return view('index',['posts'=>$posts ,'userPost'=>$postsUser]);
});

Route::get('create_tag', [TagController::class, 'create'])->name('tags.create');
Route::post('tags', [TagController::class, 'store'])->name('tags.store');


Route::get('/registration', [UserController::class, 'create'
]);

Route::get('/view-post', [UserController::class, function(){
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

Route::get('/admin-post', function(){
    $posts = Post::all();
    return view('admin-post', ['posts'=>$posts]);
});
Route::get('/admin-urers', function(){
    return view('admin-users');
});
Route::get('/login', [UserController::class, function(){
    return view('login');
}]);

Route::get('/all-posts', function () {
    $posts = Post::all();
    return view('all-posts',['posts'=>$posts]);
});

Route::get('/create_post', [PostController::class, function(){
    $tags = Tag::all();
    return view('create_post', ['tags'=>$tags]);
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

Route::post('/create_commit/{post}', [CommentController::class, 'createComment']);
Route::post('/commit/{post}', [CommentController::class, 'createComment']);

Route::get('/create_commit/{post}', [CommentController::class, 'show'])->name('posts.show');

Route::resource('posts', PostController::class);
Route::resource('tags', TagController::class);
