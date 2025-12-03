<?php

// routes/web.php

use App\Http\Controllers\AutosController;
use Illuminate\Support\Facades\Route;


// Route::get('/', [AutoController::class, 'index']) -> name('autos.index');

// Route::get('/autos/create', [AutoController::class, 'create']) -> name('autos.create');

// Route::post('/autos/store', [AutoController::class, 'store']) -> name('autos.store');

// Route::get('/autos/{id}/edit', [AutoController::class, 'edit'])->name('autos.edit');
// Route::put('/autos/{id}', [AutoController::class, 'update'])->name('autos.update');


// Route::delete('/autos/delete', [AutoController::class, 'destroy']) -> name('autos.destroy');

Route::resource('/autos', AutosController::class);

