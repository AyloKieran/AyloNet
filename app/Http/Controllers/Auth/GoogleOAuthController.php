<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class GoogleOAuthController extends Controller
{
    public function redirect()
    { 
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLoginUser($user);

        return redirect('/');
    }

    public function _registerOrLoginUser($data)
    {
        $user = User::where([['email', $data->email], ['provider', "google"]])->first();
        if(!$user) {
            $user = new User();

            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider = "google";
            $user->provider_id = $data->id;
            $user->email_verified_at = Carbon::now();
        }

        $user->avatar = $data->avatar;
        $user->save();

        Auth::login($user);
    }
}