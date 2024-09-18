<?php

use VaahCms\Modules\Appointment\Http\Controllers\Backend\DoctorsAppointmentsController;

Route::group(
    [
        'prefix' => 'backend/appointment/doctorsappointments',
        
        'middleware' => ['web', 'has.backend.access'],
        
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', [DoctorsAppointmentsController::class, 'getAssets'])
        ->name('vh.backend.appointment.doctorsappointments.assets');
    /**
     * Get List
     */
    Route::get('/', [DoctorsAppointmentsController::class, 'getList'])
        ->name('vh.backend.appointment.doctorsappointments.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [DoctorsAppointmentsController::class, 'updateList'])
        ->name('vh.backend.appointment.doctorsappointments.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [DoctorsAppointmentsController::class, 'deleteList'])
        ->name('vh.backend.appointment.doctorsappointments.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', [DoctorsAppointmentsController::class, 'fillItem'])
        ->name('vh.backend.appointment.doctorsappointments.fill');

    /**
     * Create Item
     */
    Route::post('/', [DoctorsAppointmentsController::class, 'createItem'])
        ->name('vh.backend.appointment.doctorsappointments.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [DoctorsAppointmentsController::class, 'getItem'])
        ->name('vh.backend.appointment.doctorsappointments.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [DoctorsAppointmentsController::class, 'updateItem'])
        ->name('vh.backend.appointment.doctorsappointments.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [DoctorsAppointmentsController::class, 'deleteItem'])
        ->name('vh.backend.appointment.doctorsappointments.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [DoctorsAppointmentsController::class, 'listAction'])
        ->name('vh.backend.appointment.doctorsappointments.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [DoctorsAppointmentsController::class, 'itemAction'])
        ->name('vh.backend.appointment.doctorsappointments.item.action');

    //---------------------------------------------------------

});
