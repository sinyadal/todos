<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', 'TodosController@index')->name('todo.index');
Route::post('/todos/create', 'TodosController@store')->name('todo.create');