<?php

    use App\Http\Controllers\AppController;
    use App\Http\Controllers\StudentsController;
    use Illuminate\Support\Facades\Route;

    // home route
    Route::get('/', [AppController::class, 'home'])->name('home');

    // students routes 
    Route::prefix('students')->name('students.')->group(
        function () {
            Route::get('/', [StudentsController::class, 'index'])->name('students');
            Route::get('/create', [StudentsController::class, 'create'])->name('create');
            Route::post('/', [StudentsController::class, 'store'])->name('store');
            Route::get('/{student}/edit', [StudentsController::class, 'edit'])->name('edit');
            Route::put('/{student}', [StudentsController::class, 'update'])->name('update');
            Route::delete('/delete/{student}', [StudentsController::class, 'destroy'])->name('destroy');
        }
    );
