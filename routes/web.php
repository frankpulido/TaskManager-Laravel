<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataViewController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dataview/allgrid', [DataViewController::class, 'allGrid'])->name('dataview.allgrid');
Route::get('/dataview/byproject', [DataViewController::class, 'byProject'])->name('dataview.byproject');
Route::get('/dataview/byprogress', [DataViewController::class, 'byProgress'])->name('dataview.byprogress');
Route::get('/dataview/bykind', [DataViewController::class, 'byKind'])->name('dataview.bykind');

Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::get('/task/show', [TaskController::class, 'show'])->name('task.show');
Route::get('/task/update', [TaskController::class, 'update'])->name('task.update');
Route::get('/task/delete', [TaskController::class, 'destroy'])->name('task.delete');

