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

Route::resource('properties', 'PropertyController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

Route::resource('checklists', 'ChecklistController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

Route::resource('checklist-item-groups', 'ChecklistItemGroupController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
