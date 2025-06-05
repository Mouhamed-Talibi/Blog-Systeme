<?php

    use App\Http\Controllers\AppController;
    use App\Http\Controllers\FriendController;
    use App\Http\Controllers\PrisidentController;
    use App\Http\Controllers\StudentsController;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Foundation\Auth\EmailVerificationRequest;
    use Illuminate\Http\Request;

    // home route
    Route::get('/', [AppController::class, 'home'])->name('home');

    // login page testing
    Route::get('/login', function () {
        return 'Login page here';
    })->name('login');


    // register route 
    Route::get('/register', [FriendController::class, 'register'])->name('register');
    // submit registration
    Route::post('/register', [FriendController::class, 'submitRegistration'])->name('submitRegistration');

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

    // President Registration Routes
    Route::get('/president/register', [PrisidentController::class, 'showRegistrationForm'])
        ->name('president.register.form');

    Route::post('/president/register', [PrisidentController::class, 'register'])
        ->name('president.register');

    // email verification routes 
    Route::get('/email/verify', [PrisidentController::class, 'verifyEmail'])
        ->name('email.verify');

    // with id and hash
    Route::get('/email/verify/{id}/{hash}', [PrisidentController::class, 'verify'])
        ->middleware(['auth', 'signed'])->name('verification.verify');

    // send email verifiation
    Route::post('/email/verification-notification', [PrisidentController::class, 'sendEmailVerification'])
        ->middleware(['auth', 'throttle:6,1'])->name('verification.send');
