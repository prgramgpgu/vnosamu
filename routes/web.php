<?php

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
    Route::resource('sections', SectionController::class)->except(['edit', 'update']);

    Route::get('/sections/{section}/edit/', [SectionController::class, 'edit'])->name('sections.edit');
    Route::patch('/sections/{section}/update/', [SectionController::class, 'update'])->name('sections.update');


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

