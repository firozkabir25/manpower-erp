<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DashboardController, LicenceController, ForeignAgentController, SponsorController, VisaProfessionController,
    WorkingProfessionController, ExpenseController, StatusController, CountryController, CompanyController, AirlineController, CurrencyController,
    LocalAgentController};
use App\Http\Controllers\Admin\Processing\{PassportEntryController, VisaBlockController, ProjectController, WorkerController};

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('home');
    Route::resource('licence', LicenceController::class);
    Route::get('/ledger-search', [ForeignAgentController::class, 'ledgerSearch'])->name('ledger.search');
    Route::resource('foreign-agents', ForeignAgentController::class);
    Route::resource('sponsors', SponsorController::class);
    Route::resource('visa-profession', VisaProfessionController::class);
    Route::resource('working-professions', WorkingProfessionController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::get('/expenses/{id}/toggle-active', [ExpenseController::class, 'toggleActive'])->name('expenses.toggle.active');
    Route::resource('status', StatusController::class);
    Route::resource('country', CountryController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('airline', AirlineController::class);
    Route::resource('currency', CurrencyController::class);
    Route::resource('localagent', LocalAgentController::class);
    // Process Routes
    Route::resource('passport-entries', PassportEntryController::class);
    Route::resource('visa-blocks', VisaBlockController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('workers', WorkerController::class);






    // Route::prefix('admin')->name('admin.')->group(function () {
    // });


});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
