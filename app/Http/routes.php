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

Route::get('/', function () {
    return view('welcome');
});
/* Route::get('/domain', function() {
    $domain = new App\domain();
    
    $data = $domain->all(array('emaildomain','id'));

    foreach ($data as $list) {
        echo $list->id . ' ' . $list->emaildomain .'</br>';
    }
}); */

Route::get('/userdomain', function() {
    $userdomain = new App\userdomain();
    
    $data = $userdomain->all(array('useremail','id'));

    foreach ($data as $list) {
        echo $list->id . ' ' . $list->useremail .'</br>';
    }
});