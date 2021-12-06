<?php

    use App\Http\Controllers\Admin;
    use App\Http\Controllers\CustomAuthController;
    use App\Http\Controllers\FileController;
    use App\Http\Controllers\IssueController;
    use App\Http\Controllers\SectionController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', [SectionController::class, 'index'])->name('home');
    Route::get('sections/{section}', [SectionController::class, 'show'])->name('sections.show');


    Route::get('file', [FileController::class, 'create']);

    Route::post('/sections/{section}/file/upload', [FileController::class, 'store'])->name('file.upload');
    Route::get('/sections/{section}/file/', [FileController::class, 'create'])->name('file');
    Route::post('/{section}/upload', [FileController::class, 'upload'])->name('upload');
    Route::delete('/files/delete', [FileController::class, 'destroy'])->name('file.delete');
    Route::get('/files/{file}', [FileController::class, 'getFile'])->name('file.get');

    Route::post('/files/{section}/index', [FileController::class, 'index'])->name('file.index');


    Route::get('/sections/{section}/{year}', [IssueController::class, 'index'])->name('issues.index');
    Route::get('/sections/{section}/{year}/create', [IssueController::class, 'create'])->name('issues.create');
    Route::post('/sections/{section}/{year}/store', [IssueController::class, 'create'])->name('issues.store');

    #авторизация
    Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
    Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


    Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth')
        , function () {
            Route::get('/sections/create/', [Admin\SectionController::class, 'create'])->name('sections.create');
            Route::post('/sections/store/', [Admin\SectionController::class, 'store'])->name('sections.store');
            Route::get('/sections/{section}/edit/', [Admin\SectionController::class, 'edit'])->name('sections.edit');
            Route::patch('/sections/{section}/update/', [Admin\SectionController::class, 'update'])->name('sections.update');

        });
