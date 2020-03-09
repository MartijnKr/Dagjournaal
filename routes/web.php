<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


route::get('/', 'PagesController@index');
route::get('dagelijks/tabs', 'DagelijksController@tabs')->name('dagelijks.tabs');
route::put('/dagelijks/{id}/updateFromEdit','DagelijksController@updateFromEdit')->name('dagelijks.updateFromEdit');
route::get('cameratoezicht/{camera}/editCamera', 'CamerasController@edit')->name('camera.edit');
route::get('aanwezigen', 'PagesController@AanwezigenIndex');

route::resource('archief', 'NamesController');
route::resource('bijzonder', 'BijzondersController');
route::resource('dagelijks', 'DagelijksController');
route::resource('links', 'LinksController');
route::resource('cameratoezicht', 'CameraBedrijfsController');
route::resource('camera', 'CamerasController');