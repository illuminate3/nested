<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
  $items = Menu::all();
  $itemsHelper = new ItemsHelper($items);
  return View::make('hello',compact('items','itemsHelper'));
});
*/

//Route::get('/', 'PageController@show');
/*
Route::resource('pages', 'PagesController', array('except' => array('show')));

Route::group(array('prefix' => 'pages'), function () {

    foreach (array('up', 'down') as $key)
    {
        Route::post("{pages}/$key", array(
            'as' => "pages.$key",
            'uses' => "PagesController@$key",
        ));
    }

    Route::get('export', array(
        'as' => 'pages.export',
        'uses' => 'PagesController@export',
    ));

    Route::get('{pages}/confirm', array(
        'as' => 'pages.confirm',
        'uses' => 'PagesController@confirm',
    ));
});


// The slug route should be registered last since it will capture any slug-like
// route
Route::get('{slug}', array('as' => 'page', 'uses' => 'PageController@show'))
    ->where('slug', Page::$slugPattern);

//View::composer('layouts.master', 'Fbf\LaravelNavigation\NavigationComposer');
*/


Route::resource('asset', 'AssetsController');
//Route::when('assets/*', 'AssetsController');
Route::resource('items', 'ItemsController');
Route::resource('rooms', 'RoomsController');
Route::resource('sites', 'SitesController');

Route::resource('asset_statuses', 'AssetStatusesController');
Route::resource('tech_statuses', 'TechStatusesController');



Route::get('/', 'CategoryController@show');
Route::get('/', array(
	'as' => 'home',
	'uses' => 'CategoryController@show'
	));


Route::resource('categories', 'CategoriesController', array('except' => array('show')));

Route::group(array('prefix' => 'categories'), function () {

    foreach (array('up', 'down') as $key)
    {
        Route::post("{categories}/$key", array(
            'as' => "categories.$key",
            'uses' => "CategoriesController@$key",
        ));
    }

    Route::get('export', array(
        'as' => 'categories.export',
        'uses' => 'CategoriesController@export',
    ));

    Route::get('{categories}/confirm', array(
        'as' => 'categories.confirm',
        'uses' => 'CategoriesController@confirm',
    ));
});


// The slug route should be registered last since it will capture any slug-like
// route
Route::get('{slug}', array('as' => 'category', 'uses' => 'CategoryController@show'))
    ->where('slug', Category::$slugPattern);



Route::resource('vedette.admin', 'Vedette\controllers\AdminController', array('only' => array('index')));

Route::get(Config::get('vedette.vedette_routes.user_home'), array(
	'as' => 'vedette.user',
	'uses' => 'Vedette\controllers\IndexController@index')
);
Route::get(Config::get('vedette.vedette_routes.admin_home'), array(
	'as' => 'vedette.admin',
	'uses' => 'Vedette\controllers\AdminController@index')
);



Route::get('/404', array(
	'as' => 'notfound',
	'uses' => 'Vedette\controllers\AdminController@notfound'
	));

Route::group(array('before' => 'guest'), function()
{
	Route::get('login', array(
		'as' =>'login',
		'uses' => 'Vedette\controllers\SessionsController@create'
		));

	Route::get('register', array(
		'as' =>'register',
		'uses' => 'Vedette\controllers\AuthController@create'
		));
	Route::resource('auth', 'Vedette\controllers\AuthController',
		array('only' => array('create', 'store')
		));

	Route::get('password/forgot', array(
		'as' => 'forgot',
		'uses' => 'Vedette\controllers\PasswordController@forgot'
		));
	Route::post('password/reset', array(
		'before' => 'csrf',
		'as' => 'password.request',
		'uses' => 'Vedette\controllers\PasswordController@request'
		));
	Route::get('password/reset/{token}', array(
		'as' => 'password.reset',
		'uses' => 'Vedette\controllers\PasswordController@reset'
		));
	Route::post('password/reset/{token}', array(
		'before' => 'csrf',
		'as' => 'password.update',
		'uses' => 'Vedette\controllers\PasswordController@update'
		));
});

/*
Route::group(array('before' => 'auth'), function()
{
	Route::resource('auth', 'Vedette\controllers\AuthController', array(
		'except' => array('index', 'create', 'store')
		));
});
*/

Route::get('login', array(
	'as' =>'login',
	'uses' => 'Vedette\controllers\SessionsController@create'
	));

//Route::get('o-auth/login', 'Vedette\controllers\SessionsController@handleLoginPage');

Route::get('o-auth/login', array(
	'as' =>'o-auth/login',
	'uses' => 'Vedette\controllers\SessionsController@handleLoginPage'
	));


Route::get('logout', array(
	'as' =>'logout',
	'uses' => 'Vedette\controllers\SessionsController@destroy'
	));
Route::resource('sessions', 'Vedette\controllers\SessionsController', array(
	'before' => 'csrf',
	'only' => array('create', 'store', 'destroy')
	));

Route::group(
	array(
//		'prefix' => 'admin',
		'before' => 'auth.admin'
		),
	function()
{
	Route::get('admin', array(
		'as' => 'admin.index',
		'uses' => 'Vedette\controllers\AdminController@index'
		));
	Route::resource('roles', 'Vedette\controllers\RolesController',
		array('except' => array('show')
		));
	Route::resource('users', 'Vedette\controllers\UsersController',
		array(
			'before' => 'csrf'
//			'except' => array('show')
		));


/*
|--------------------------------------------------------------------------
| Chumper Datatables API
|--------------------------------------------------------------------------
*/
Route::get('api/users', array(
	'as'=>'api.users',
	'uses'=>'Vedette\controllers\UsersController@getDatatable'
	));


});

