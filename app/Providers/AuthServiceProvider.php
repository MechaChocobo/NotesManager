<?php

namespace App\Providers;

use App\User;
use App\LoggedInUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->viaRequest('api', function ($request) {

		//Admittedly unsecure. Used as a quick placeholder solution to be replaced by proper authorization handler in an actual project

		if($request->has('id'))
			{
				$userId = $request->input('id');
				$loginRec = DB::table('loggedInUsers')->where('id', $userId)->first();
				if($loginRec && $loginRec->token == 'placeholder token')
				{
					return User::where('id', $userId)->first();
				}
			}
			return null;
        });
    }
}