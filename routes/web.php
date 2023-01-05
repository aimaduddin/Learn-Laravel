<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Twig\Extension\Debug;

/*
    GET - REQUEST A RESOURCE
    POST - CREATE A NEW RESOURCE
    PUT - UPDATE A RESOURCE
    PATCH - MODIFY A RESOURCE
    DELETE - DELETE A RESOURCE
    OPTIONS - ASK THE SERVER WHICH VERBS ARE ALLOWED
*/



// GET
Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/{id}', [PostsController::class, 'show']);

// POST
Route::get('/blog/create', [PostsController::class, 'create']);
Route::post('/blog', [PostsController::class, 'store']);

// PUT / PATCH
Route::get('/blog/edit/{id}', [PostsController::class, 'edit']);
Route::patch('/blog/{id}', [PostsController::class, 'update']);

// DELETE
Route::delete('/blog/{id}', [PostsController::class, 'destroy']);



Route::resource('blog', PostsController::class);
// route for the invoke method
Route::get('/', HomeController::class);

// Multiple HTTP Verbs
// Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
// Route::any('/blog', [PostsController::class, 'index']);

// Return view
// Route::view('/blog', 'blog.index', ['name' => 'Code with Aima']);
