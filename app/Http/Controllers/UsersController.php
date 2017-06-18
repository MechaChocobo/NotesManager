<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Note;
use App\User;
use App\LoggedInUser;

class UsersController extends Controller
{
    public function __construct()
    {

    }

	public function login(Request $request)
	{
		$email = $request->input('email');
		$pass = $request->input('pass');
		if ($email && $pass) {
			$user = User::where('email', $email)->first();
			if ($user && password_verify($pass, $user->password))
			{
				//Check just in case the user is somehow trying to log in again
				if(!DB::table('loggedInUsers')->where('id', $user->id)->first())
				{
					DB::table('loggedInUsers')->insert([
						'id' => $user->id,
						'token' => 'placeholder token'
					]);
				}
				return redirect()->route('notes', ['id' => $user->id]);
			}
		}
		return view('login', ['invalid' => 1]);
	}
	
	public function logout(Request $request)
	{
		$userId = $request->input('id');
		DB::table('loggedInUsers')->where('id', $userId)->delete();
		return redirect()->route('loginPage');
	}
    //
}
