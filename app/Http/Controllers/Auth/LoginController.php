<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Socialite;
use Mail;
use Stripe\Stripe;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role == 1) {
            $this->redirectTo = route('home');
        } else {
            $this->redirectTo = route('user.dashboard');
        }
        $this->middleware('guest')->except('logout');
    }


    public function socialLogin($social)
    {
        return Socialite::driver($social)->stateless()->redirect();
    }

    public function handleProviderCallback($social)
    {

         $userSocial = Socialite::driver($social)->stateless()->user();

        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if ($user) {
            Auth::login($user);
            return redirect(Route('user.dashboard'));
        } else {
            $user = new User;
            $user->role = 2;
            $user->name = $userSocial->getName();
            $user->email = $userSocial->getEmail();
            $user->image = $userSocial->getAvatar();
            $user->provider_id = $userSocial->getId();
            $user->provider = $social;
            $user->save();
            
            Auth::login($user, true);
        
            return redirect('user/dashboard');
        }
      }
}


            