<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', [
    'uses' => 'TodosController@index'
]);