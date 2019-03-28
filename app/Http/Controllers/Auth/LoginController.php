<?php

namespace MyBlog\Http\Controllers\Auth;

use MyBlog\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Laravel\Socialite\Facades\Socialite;
use MyBlog\Http\Controllers\viewPosts;
use MyBlog\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $authUser = $this->findOrCreateUser($user);

        \Auth::login($authUser, true);

        return redirect()->guest('/home');




    }


   public function findOrCreateUser($fbUser)
    {
        $authUser = User::where('provider_id', $fbUser->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $fbUser->name,
            'email'    => $fbUser->email,
            'provider_id' => $fbUser->id,
            'provider' => "Facebook",
            'provider_id' => $fbUser->id
        ]);
    }


}
