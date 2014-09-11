<?php

use Helpers\Response\MyResponse;
/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
<<<<<<< HEAD

 /* Your choice for authentication mechanisms will greatly affect the logic in your filters. 
  |  I’ve opted not to go into great detail with regards to how the tokens are generated and users are stored. 
  |  Ultimately; you can check for token headers, username/password combos or even IP addresses.
  |
  | What’s important to note here is that we check for this thing (tokens in this case) and if they do not
  |  match those stored in user records, we abort the application execution cycle with a 400 error (and message).
  |
  |  You can find out more about filters at: http://laravel.com/docs/routing#route-filters.
 */
  
  /* Get the users api_token from the dtabase and compare it to the api_token
  |  alias X-Api-Token recieved from the headers . Only matching users will
  |  be authenticated with the api
  */
 Route::filter('api.auth', function()
 {
 	//Get database user 
 	if (Auth::check()) 
 	{
 		$api_token = Auth::user()->api_token;	
 	}

 	if (Request::header('X-Api-Token') !== $api_token)
 	{
 		$status = 400;

 		$data = array(
 			'status'  => $status,
			'success' => false,
			'message' => 'Invalid Api_Token, Unauthorised'
			);

 		return MyResponse::json($data, $status);
 	}
 });
=======
>>>>>>> laravel/master
