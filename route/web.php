<?php


Route::page('/', function(){
	redirect( route('site_home', false) );
}, 'home');


/*=======================================
=            Frontend Routes            =
=======================================*/

Route::page('home', function(){
	return view('website/home.php');
}, 'site_home');

/*=====  End of Frontend Routes  ======*/


Route::page('test', function(){
	return view('website/test.php');
}, 'test');




Route::page('sitemap.xml', function(){
	return view('website/sitemap.php');
}, 'sitemap');


/*=====  End of Page Routes  ======*/




Route::page( 'dashboard', function(){
	return view('backend/dashboard.php');
}, 'dashboard' );



Route::page( 'blank', function(){
	return view('backend/blank_page.php');
}, 'blank' );

Route::page( 'login', function(){
	return view('backend/auth/login.php');
}, 'login' );


Route::notFound(function () {
	return view('not_found.php');
}, 'not_found');