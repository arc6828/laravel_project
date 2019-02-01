<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\User;
use App\SocialAccount;


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

    //START SOCIALITE
    public function redirectToProvider($provider = 'facebook')
   {
       return Socialite::driver($provider)->redirect();
   }

   public function handleProviderCallback($provider = 'facebook')
   {
       $providerUser = Socialite::driver($provider)->user();

       $user = $this->createOrGetUser($provider, $providerUser);
       auth()->login($user);

       return redirect()->to('/home');

       //$user = Socialite::driver($provider)->user();

   }

   public function createOrGetUser($provider, $providerUser)
   {
     $account = SocialAccount::whereProvider($provider)
                 ->whereProviderUserId($providerUser->getId())
                 ->first();

      if ($account) {
          return $account->user;
      } else {

          $user = User::whereEmail($providerUser->getEmail())->first();

          if (!$user) {

              $user = User::create([
                  'email' => $providerUser->getEmail(),
                  'name' => $providerUser->getName(),
                  'password' => md5(rand(1,10000)),
              ]);
          }
          $account = new SocialAccount([
              'provider_user_id' => $providerUser->getId(),
              'provider' => 'facebook'
          ]);

          $account->user()->associate($user);
          $account->save();

          /*$user->identities()->create([
              'provider_user_id'   => $providerUser->getId(),
              'provider' => $provider,
          ]);*/

          return $user;
      }
   }

    //END SOCIALITE


}
