<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingListController;

Route::get('/', [ShoppingListController::class, 'index'])->name('shopping-list.index');
Route::get('/shopping-list/create', [ShoppingListController::class, 'create'])->name('shopping-list.create');
Route::post('/shopping-list', [ShoppingListController::class, 'store'])->name('shopping-list.store');
Route::get('/shopping-list/{id}/edit', [ShoppingListController::class, 'edit'])->name('shopping-list.edit');
Route::put('/shopping-list/{id}', [ShoppingListController::class, 'update'])->name('shopping-list.update');
Route::delete('/shopping-list/{id}', [ShoppingListController::class, 'destroy'])->name('shopping-list.destroy');
Route::get('/shopping-list/total', [ShoppingListController::class, 'getTotalAmount'])->name('shopping-list.total');
