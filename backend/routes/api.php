<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PostController;

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);      // list all
    Route::get('/{id}', [CategoryController::class, 'show']);   // detail
    Route::post('/', [CategoryController::class, 'store']);     // create
    Route::put('/{id}', [CategoryController::class, 'update']); // update
    Route::delete('/{id}', [CategoryController::class, 'destroy']); // delete
});

Route::prefix('admin/service')->group(function () {
    Route::get('/', [ServiceController::class, 'index']);      // list all
    Route::get('/{id}', [ServiceController::class, 'show']);   // detail
    Route::post('/', [ServiceController::class, 'store']);     // create
    Route::put('/{id}', [ServiceController::class, 'update']); // update
    Route::delete('/{id}', [ServiceController::class, 'destroy']); // delete
});


Route::prefix('service')->group(function () {

    // danh sách theo category
    Route::get('/category/{categorySlug}', [
        ServiceController::class,
        'getByCategory'
    ]);

    // chi tiết dịch vụ
    Route::get('/detail/{categorySlug}/{serviceSlug}', [
        ServiceController::class,
        'detail'
    ]);

});

Route::prefix('post')->group(function () {
    Route::get('/category/{categorySlug}', [PostController::class, 'index']);
    Route::get('/detail/{slug}', [PostController::class, 'show']);
    Route::get('/service/{slug}/posts',[PostController::class, 'servicePosts']
);
});