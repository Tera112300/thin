<?php
//シンボリックリンクのパスからrequire_onceしている。webrootから初めたい場合htaccessとパス書き換え
require_once 'app/core/LaralikeRouter.php';
require_once 'app/core/LaralikeRoute.php';
require_once 'app/core/Skinny.php';

use laralike\LaralikeRouter as Route;


Route::setNamespace('\\app\\controller\\');


Route::get('/thin/', 'HomeController@index');
Route::get('/thin/pagination_demo', 'HomeController@pagination_demo');

Route::get('/thin/form', 'HomeController@form');

Route::get('/thin/form_mail', 'HomeController@form_mail');
