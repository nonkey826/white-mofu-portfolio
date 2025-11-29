<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Models\Dog;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return redirect('/dogs');
});

// 固定URL
Route::get('/dogs', [DogController::class, 'index'])->name('dogs.index');
Route::get('/dogs/create', [DogController::class, 'create'])->name('dogs.create');
Route::post('/dogs', [DogController::class, 'store'])->name('dogs.store');

// 検索
Route::get('/dogs/find', [DogController::class, 'find'])->name('dogs.find');
Route::post('/dogs/find', [DogController::class, 'search'])->name('dogs.search');

// 詳細・編集など
Route::get('/dogs/{id}', [DogController::class, 'show'])->name('dogs.show');
Route::get('/dogs/{id}/edit', [DogController::class, 'edit'])->name('dogs.edit');
Route::put('/dogs/{id}', [DogController::class, 'update'])->name('dogs.update');
Route::delete('/dogs/{id}', [DogController::class, 'destroy'])->name('dogs.destroy');

// 推しもふ保存
Route::get('/choose/{id}', [DogController::class, 'choose'])->name('dogs.choose');

// 推しもふ結果表示
Route::get('/result', function () {
    $dogId = session('favorite_dog_id');
    $dog = $dogId ? Dog::find($dogId) : null;
    return view('result', compact('dog'));
})->name('result');


// お問い合わせフォーム
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/confirm', [ContactController::class, 'confirm']);
Route::post('/contact/thanks', [ContactController::class, 'store']);

// 管理者用（一覧・詳細・削除）
Route::prefix('admin')->group(function () {

    Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});

