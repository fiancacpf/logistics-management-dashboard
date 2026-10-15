<?php

use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboundsController;
use App\Http\Controllers\StockViewController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'root'])->name('root');
    Route::get('/index', [HomeController::class, 'root'])->name('root');
    Route::get('/stock-chart-data', [StockViewController::class, 'getMonthlyStockData']);
    Route::get('/beneficiaries/chart-data', [BeneficiaryController::class, 'beneficiaryChartData'])->name('beneficiaries.chartData');
    Route::get('/inbounds-show/{id}', [InboundsController::class, 'show'])->name('inbounds.show');

});
