<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('admin.home');
    Route::resource('users', UserController::class);
    Route::resource('rules', RulesController::class);
    Route::resource('forms', FormsController::class);
    Route::put('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::get('/case-manager', [UserController::class, 'caseManager'])->name('users.caseManager');
    Route::get('/partners', [UserController::class, 'partners'])->name('users.partners');
    Route::get('/add-partner', [UserController::class, 'addPartner'])->name('users.addPartner');
    Route::post('/create-partner', [UserController::class, 'createPartner'])->name('users.createPartner');
    Route::get('/cases', [ContractController::class, 'adminIndex'])->name('cases.adminIndex');
    Route::put('/cases/{case}/reactivate', [ContractController::class, 'reactivate'])->name('cases.reactivate');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/rules-forms', [HomeController::class, 'rulesForms'])->name('rules-forms');
Route::resource('cases', ContractController::class);
Route::resource('manager', ManagerController::class);
Route::resource('partner', PartnerController::class);
Route::resource('users', UserController::class);

