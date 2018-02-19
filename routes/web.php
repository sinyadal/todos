<?php

Route::view('/', 'welcome');

Route::prefix('todo')->group(function () {
    Route::get('/', 'TodosController@index')->name('todo.index');
    Route::post('/create', 'TodosController@store')->name('todo.create');
    Route::delete('/{id}', 'TodosController@destroy')->name('todo.destroy');    
    Route::patch('/{id}', 'TodosController@update')->name('todo.update');  
    Route::get('/{id}', 'TodosController@status')->name('todo.status');                  
                    
});

Route::get('user/{name?}', function ($name = null) {
    return $name;
});
