<?php

Route::namespace('Zngue\Test\Controllers')->as('test::')->middleware('web')->group(function ($api) {
    // Routes defined here have the web middleware applied
    // like the web.php file in a laravel project
    // They also have an applied controller namespace and a route names.

    $api->get('/ua',function (){

        echo 123556;die;
    });



    Route::middleware('test')->group(function () {
        // Routes defined here have the self-assigned middleware applied.
        // By default this middleware is empty.
    });
});
