<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$router->group(App::environment('testing')?[]:['middleware' => 'jwt.auth'], function ($router) {
    Route::resource('amphitryons', 'AmphitryonController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('properties', 'PropertyController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('checklists', 'ChecklistController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('checklist-item-groups', 'ChecklistItemGroupController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('checklist-items', 'ChecklistItemController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('checklist-registries', 'ChecklistRegistryController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::get('checklist-registries/{id}/xlsx', 'ChecklistRegistryController@excel');

    Route::resource('keys', 'KeyController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('key-conditions', 'KeyConditionController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('key-loans', 'KeyLoanController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('modules', 'ModuleController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
});
