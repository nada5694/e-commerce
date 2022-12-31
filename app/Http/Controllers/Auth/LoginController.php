<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Socialite;
use Str;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function _OAuthSignInInfo($user)
    {
        // if the user doesn't exist, then add them
        // if they do, get the model
        // either way, authenticate the user into the application and redirect afterwards
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'username' => $user->name , // username (column from users table) => $user->name (name from third-party app)
            'password' => Hash::make(Str::random(24)) ,
            'avatar'   => $user->avatar ,
        ]);

        Auth::login($user, true);
    }

    public function github()
    {
        // send the user's request to github
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        // get oauth request back from github to authenticate user
        $user = Socialite::driver('github')->user();
        $this->_OAuthSignInInfo($user);

        return redirect()->route('home');
    }

    public function google()
    {
        // send the user's request to google
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        // get oauth request back from google to authenticate user
        $user = Socialite::driver('google')->user();
        $this->_OAuthSignInInfo($user);

        return redirect()->route('home');
    }

    public function facebook()
    {
        // send the user's request to facebook
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        // get oauth request back from facebook to authenticate user
        $user = Socialite::driver('facebook')->user();
        $this->_OAuthSignInInfo($user);

        return redirect()->route('home');
    }
}
