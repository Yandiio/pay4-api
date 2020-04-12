<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('signin','AuthSiswaController@login');
$router->post('signup','AuthSiswaController@register');
$router->get('akunsaya','UserSiswaController@profile');

$router->group(['prefix' => 'auth'],function() use ($router){
    $router->post('login','AuthController@login');
    $router->post('register','AuthController@register');
    $router->get('profile','UserController@profile');
    $router->get('user/{id}','UserController@singleUser');
    $router->get('users','UserController@allUser');
});


$router->group(['middleware' => 'auth'],function() use ($router){
    
    $router->group(['middleware' => 'isAdmin'],function() use ($router){
        $router->get('/kelas','KelasController@index');
        $router->get('/kelas/{id}','KelasController@show');
        $router->post('/kelas','KelasController@store');
        $router->put('/kelas/{id}','KelasController@update');
        $router->delete('/kelas/{id}','KelasController@delete');

        $router->get('/spp','SppController@index');
        $router->get('/spp/{id}','SppController@show');
        $router->post('/spp','SppController@store');
        $router->put('/spp/{id}','SppController@update');
        $router->delete('/spp/{id}','SppController@delete');

        $router->get('/siswa','SiswaController@index');
        $router->get('/siswa/{id}','SiswaController@show');
        $router->post('/siswa','SiswaController@post');
        $router->put('/siswa/{id}','SiswaController@update');
        $router->delete('/siswa/{id}','SiswaController@delete');
    });

    $router->get('/pembayaran','PembayaranController@index');
    $router->get('/pembayaran/{id}','PembayaranController@show');
    $router->post('/pembayaran','PembayaranController@store');
    $router->put('/pembayaran/{id}','PembayaranController@update');
    $router->delete('/pembayaran/{id}','PembayaranController@delete');
});
   
