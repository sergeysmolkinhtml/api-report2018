<?php


use App\Http\Controllers\DriversController;
use App\Http\Resources\DriverListResource;
use App\Http\Resources\DriverRetrieveResource;
use Illuminate\Support\Facades\Route;

Route::controller(DriversController::class)->as('api.')->group(function () {

    Route::get('v1/report/format={json?}',                       'list')    ->name('api.list');
    Route::get('v1/report/format={json?}/driver_id={driverID?}', 'retrieve')->name('api.retrieve');
    Route::get('v1/report/sort={order?}',                        'list')                            ->name('api.sorted');


});


