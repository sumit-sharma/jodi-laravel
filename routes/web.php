<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\SearchController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("/login", [AuthController::class, "showLogin"])->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login.post");
});

Route::get('/', RedirectController::class);




Route::middleware("auth")->group(function () {
    Route::any("/logout", [AuthController::class, "logout"])->name("logout");

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/customer-upload', [CustomerController::class, 'upload'])->name('customer.upload');
    Route::resource('customer', CustomerController::class);

    Route::get('/dashboard/get-castes/{religion}',[DashboardController::class, 'getCaste'])->name('get-caste');
    Route::get('/dashboard/fetch-distinct-data', [DashboardController::class, 'getDistinctData'])->name('fetch-distinct-data');
    Route::get('/dashboard/fetch-table-data', [DashboardController::class, 'getTableData'])->name('fetch-table-data');


    Route::prefix('services')->group(function(){

        Route::get('/search-members', [SearchController::class, 'searchMembers'])->name('seach-members');

        Route::any('/search-result', [SearchController::class,'searchData'])->name('search-data');


    });

    Route::get('/pdfview/{type}/{rno}', [DashboardController::class, 'pdfview'])->name('pdfview');


});
