<?php

namespace Lib;

//Route::set('relatív URL', 'Kontroller.metódus')

//Index Controller
Route::set('',			'Index.wall');
Route::set('main',		'Index.ajaxwall');
Route::set('register',	'Index.register');
Route::set('stats',		'Index.stats');
Route::set('users',		'Index.users');

//Register Controller
Route::set('namechange','Register.checkname');
Route::set('regtry',	'Register.registerUser');

//Login Controller

Route::set('login',		'Login.logintry');
Route::set('logout',	'Login.logout');

//Post Controller

Route::set('createpost','Post.createPost');
Route::set('getpost',	'Post.getPost');
Route::set('editpost',	'Post.editPost');
Route::set('deletepost','Post.deletePost');
Route::set('savepost',	'Post.savePost');