<?php

return [


/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'vedette_db' => array(
	'prefix'					=> '',
	'default_role_id'			=> '2',
	'activated'					=> '1',
	'verified'					=> '1',
),


/*
|--------------------------------------------------------------------------
| auth settings
|--------------------------------------------------------------------------
*/
'vedette_auth' => array(
	'throttle_limit'			=> 5,
	'attempt_limit'				=> 5,
	'throttle_time_period'		=> 2,
	'suspension_time'			=> 15,
	'login_cache_field'			=> 'email',
),


/*
|--------------------------------------------------------------------------
| Package settings
|--------------------------------------------------------------------------
*/
'vedette_settings' => array(
	'use_hosted_domain'			=> True,
	'hosted_domain'				=> 'bryantschools.org',
	'add_profile'				=> True,
//	'image_1'					=> '/packages/illuminate3/vedette/images/ford_vedette_1950.jpg',
//	'image_2'					=> '/packages/illuminate3/vedette/images/laravel-l-slant.png'
	'image_1'					=> '/assets/images/BryantHighSchool.jpg',
	'image_2'					=> '/assets/images/administration.jpg'
),


/*
|--------------------------------------------------------------------------
| General configs used for naming conventions
|--------------------------------------------------------------------------
*/
'vedette_html' => array(

//	'title'						=> 'Vedette',
//	'project_name'				=> 'Vedette',
//	'title'						=> 'ThirdCrate',
//	'project_name'				=> 'ThirdCrate',
	'title'						=> 'BAM',
	'project_name'				=> 'BAM',
//	'title'						=> 'Bryant School District',
//	'project_name'				=> 'Bryant School District',

	'separator'					=> ':',
	'author'					=> 'Illuminate3.com',
	'keywords'					=> 'Vedette, Authentification, Authorization, user management, roles, permissions, groups, laravel',
	'description'				=> 'Vedette: an authentification and authorization package for laravel 4.2',

//	'include_nav'				=> 'layouts.nav.hr',
//	'include_nav'				=> 'layouts.nav.thrid',
	'include_nav'				=> 'layouts-vedette.nav.bam',


/*
	'ipsum_content'				=> 'content.vedette',
	'hr_content'				=> 'content.hr',
	'third_content'				=> 'content.third',
	'bam_content'				=> 'content.bam',
*/
//	'ipsum_content'				=> 'content.vedette',
//	'ipsum_content'				=> 'content.hr',
//	'ipsum_content'				=> 'content.third',
	'ipsum_content'				=> 'content.bam',
//	'footer'					=> 'Vedette © 2014',
	'footer'					=> 'Bryant School District © 2015',

),


/*
|--------------------------------------------------------------------------
| routes
|--------------------------------------------------------------------------
*/
'vedette_routes' => array(
	'prefix_auth'				=> 'auth',
	'home'						=> 'home',
	'user_home'					=> 'vedette.user',
	'admin_home'				=> 'vedette.admin',

	// IF 'add_profile' = True use this Route
	'add_profile'				=> 'profiles.create',
),


//'identified_by'		=> ['username', 'email'],

// The Super Admin role
// (returns true for all permissions)
//'super_admin'		=> 'Super Admin',


// Define Models if you extend them.
/*
'models' => [
	'user'			=> 'Illuminate3\Vedette\models\User',
	'role'			=> 'Illuminate3\Vedette\models\Role',
	'permission'	=> 'Illuminate3\Vedette\models\Permission',
],
*/



/*
|--------------------------------------------------------------------------
| General views and standard package views
|--------------------------------------------------------------------------
*/
'vedette_views' => array(

	// The layout to use : change to what matches your application
	'layout'					=> 'layouts.master',
	'layout_simple'				=> 'layouts.simple',

	// datatable
	'datatable'					=> 'layouts._partials.datatable',

	// Auth views
	'login'						=> 'auth.login',
	'login-oauth'				=> 'auth.login',
	'register'					=> 'auth.register',
	'forgot'					=> 'auth.forgot',

	// Admin Users views
	'users_index'				=> 'users.index',
	'users_create'				=> 'users.create',
	'users_edit'				=> 'users.edit',
	'users_show'				=> 'users.show',

	// Admin Roles views
	'roles_index'				=> 'roles.index',
	'roles_create'				=> 'roles.create',
	'roles_edit'				=> 'roles.edit',


/*
	'dropdown'				=> 'vedette::partials.dropdown',

	// Dashboard area : change to something more appropriate or build out what is provided
	'dashboard'				=> 'vedette::auth.index',

	// Following views won't probably be needed to be over ridden but just in case

	'auth'					=> 'vedette::auth.index',
	'forgot_confirm'		=> 'vedette::auth.forgot-password-confirm',

	'users_show'			=> 'vedette::users.show',
	'users_permission'		=> 'vedette::users.permission',

	//Groups Views
	'groups_index'			=> 'vedette::groups.index',
	'groups_create'			=> 'vedette::groups.create',
	'groups_edit'			=> 'vedette::groups.edit',
	'groups_permission'		=> 'vedette::groups.permission',

	//Permissions Views
	'permissions_index'		=> 'vedette::permissions.index',
	'permissions_edit'		=> 'vedette::permissions.edit',
	'permissions_create'	=> 'vedette::permissions.create',

	//Throttling Views
	'throttle_status'		=> 'vedette::throttle.index',

	//Email Views
	'forgot_password'		=> 'vedette::emails.forgot-password',
	'register_activate'		=> 'vedette::emails.register-activate',
	'reminder'				=> 'vedette::emails.reminder',
	'email_layout'			=> 'vedette::emails.layouts.default',
*/


),


/*
|--------------------------------------------------------------------------
| Validation rules location
|--------------------------------------------------------------------------
| Need to add a section here to allow overriding of the rules used in the package
|--------------------------------------------------------------------------
*/
/*
'validation' => array(
	'user'					=> 'Illuminate3\Vedette\Services\Validators\Users\Validator',
	'permission'			=> 'Illuminate3\Vedette\Services\Validators\Permissions\Validator',
),
*/

];
