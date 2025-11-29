<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

use App\Models\Dog;


// ▼ トップページを Todo に変更
Route::get('/', [TodoController::class, 'index'])->name('todos.index');


// ▼ 白もふ（Dog）機能
Route::get('/dogs', [DogController::class, 'index'])->name('dogs.index');
Route::get('/dogs/create', [DogController::class, 'create'])->name('dogs.create');
Route::post('/dogs', [DogController::class, 'store'])->name('dogs.store');

Route::get('/dogs/find', [DogController::class, 'find'])->name('dogs.find');
Route::post('/dogs/find', [DogController::class, 'search'])->name('dogs.search');

Route::get('/dogs/{id}', [DogController::class, 'show'])->name('dogs.show');
Route::get('/dogs/{id}/edit', [DogController::class, 'edit'])->name('dogs.edit');
Route::put('/dogs/{id}', [DogController::class, 'update'])->name('dogs.update');
Route::delete('/dogs/{id}', [DogController::class, 'destroy'])->name('dogs.destroy');

Route::get('/choose/{id}', [DogController::class, 'choose'])->name('dogs.choose');

Route::get('/result', function () {
    $dogId = session('favorite_dog_id');
    $dog = $dogId ? Dog::find($dogId) : null;
    return view('result', compact('dog'));
})->name('result');


// ▼ Contact（お問い合わせ）
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/confirm', [ContactController::class, 'confirm']);
Route::post('/contact/thanks', [ContactController::class, 'store']);

Route::prefix('admin')->group(function () {
    Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});


// ▼ Todoアプリ（中級）
Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::patch('/todos/update', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/todos/delete', [TodoController::class, 'destroy'])->name('todos.destroy');
Route::get('/todos/search', [TodoController::class, 'search'])->name('todos.search');


// ▼ Category（中級）
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::patch('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
