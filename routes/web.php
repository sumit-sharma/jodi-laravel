<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerUploadController;
use App\Http\Controllers\Panel\AppointmentController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\MasterController;
use App\Http\Controllers\Panel\MatchController;
use App\Http\Controllers\Panel\SearchController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("/login", [AuthController::class, "showLogin"])->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login.post");
});

Route::get('/', RedirectController::class);

Route::get('/uploads/customer/{filename}', [CustomerUploadController::class, 'show'])
    ->where('filename', '.*'); // allow dots in filename



Route::middleware("auth")->group(function () {
    Route::any("/logout", [AuthController::class, "logout"])->name("logout");

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/uplod-photo/{rno}', [CustomerController::class, 'uplodPics'])->name('customer.uplod-photo');
    Route::delete('/delete-customer-photo', [CustomerController::class, 'deleteFile'])->name('customer.photo-delete');
    Route::post('/customer-upload', [CustomerController::class, 'upload'])->name('customer.upload');
    Route::resource('customer', CustomerController::class);

    Route::get('/dashboard/get-castes/{religion}', [DashboardController::class, 'getCaste'])->name('get-caste');
    Route::get('/dashboard/fetch-castes', [DashboardController::class, 'fetchCastes'])->name('fetch-castes');
    Route::get('/dashboard/fetch-distinct-data', [DashboardController::class, 'getDistinctData'])->name('fetch-distinct-data');
    Route::get('/dashboard/fetch-table-data', [DashboardController::class, 'getTableData'])->name('fetch-table-data');

    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointment/{id}', [AppointmentController::class, 'show'])->name('appointment.show');
    Route::post('/appointment', [AppointmentController::class, 'saveAppointment'])->name('appointment.save');


    Route::prefix('services')->group(function () {
        Route::get('/search-members', [SearchController::class, 'searchMembers'])->name('seach-members');
        Route::any('/search-result', [SearchController::class, 'searchData'])->name('search-data');
    });

    Route::prefix('main')->group(function () {
        Route::get('/manage-caste', [MasterController::class, 'viewCasteManager'])->name('manage-caste');
        Route::post('/store-caste', [MasterController::class, 'storeCaste'])->name('panel.caste-options.store');
        Route::any('/check-exist', [MasterController::class, 'checkExists'])->name('panel.check-exist');
        Route::get('/manage-zone', [MasterController::class, 'viewZoneManager'])->name('manage-zone');
        Route::post('/store-zone', [MasterController::class, 'storeZone'])->name('panel.store-zone');
        Route::get('/manage-occupation', [MasterController::class, 'viewOccupationManager'])->name('manage-occupation');
        Route::post('/store-occupation', [MasterController::class, 'storeOccupation'])->name('panel.store-occupation');
    });

    Route::get('/pdfview/{type}/{rno}', [DashboardController::class, 'pdfview'])->name('pdfview');

    Route::get('/update-match-prefrence/{rno}', [MatchController::class, 'viewUpdateMatchPrefrences'])->name('update-match-prefrence');
    Route::post('/save-match-prefrences/{rno}', [MatchController::class, 'saveMatchPrefrences'])->name('save-match-prefrences');

    Route::get('/add-more-info/{rno}', [CustomerController::class, 'viewAddMoreInfo'])->name('add-more-info');
    Route::post('/save-more-info', [CustomerController::class, 'saveMoreInfo'])->name('save-more-info');

    Route::post('/save-interaction', [CustomerController::class, 'storeInteraction'])->name('save-interaction');
    Route::post('/save-meeting', [CustomerController::class, 'storeMeeting'])->name('save-meeting');
});
