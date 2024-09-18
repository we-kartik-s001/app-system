<?php
use VaahCms\Modules\Appointment\Http\Controllers\Backend\DoctorsAppointmentsController;
/*
 * API url will be: <base-url>/public/api/appointment/doctorsappointments
 */
Route::group(
    [
        'prefix' => 'appointment/doctorsappointments',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', [DoctorsAppointmentsController::class, 'getAssets'])
        ->name('vh.backend.appointment.api.doctorsappointments.assets');
    /**
     * Get List
     */
    Route::get('/', [DoctorsAppointmentsController::class, 'getList'])
        ->name('vh.backend.appointment.api.doctorsappointments.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [DoctorsAppointmentsController::class, 'updateList'])
        ->name('vh.backend.appointment.api.doctorsappointments.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [DoctorsAppointmentsController::class, 'deleteList'])
        ->name('vh.backend.appointment.api.doctorsappointments.list.delete');


    /**
     * Create Item
     */
    Route::post('/', [DoctorsAppointmentsController::class, 'createItem'])
        ->name('vh.backend.appointment.api.doctorsappointments.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [DoctorsAppointmentsController::class, 'getItem'])
        ->name('vh.backend.appointment.api.doctorsappointments.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [DoctorsAppointmentsController::class, 'updateItem'])
        ->name('vh.backend.appointment.api.doctorsappointments.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [DoctorsAppointmentsController::class, 'deleteItem'])
        ->name('vh.backend.appointment.api.doctorsappointments.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [DoctorsAppointmentsController::class, 'listAction'])
        ->name('vh.backend.appointment.api.doctorsappointments.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [DoctorsAppointmentsController::class, 'itemAction'])
        ->name('vh.backend.appointment.api.doctorsappointments.item.action');



});
