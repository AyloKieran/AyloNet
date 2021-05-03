<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class AzureOAuthController extends Controller
{
    public function redirect()
    { 
        return Socialite::driver('azure')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('azure')->stateless()->user();

        $this->_registerOrLoginUser($user);

        return redirect('/');
    }

    public function _registerOrLoginUser($data)
    {
        $user = User::where([['email', $data->email], ['provider', "azure"]])->first();
        if(!$user) {
            $user = new User();

            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider = "azure";
            $user->provider_id = $data->id;
            $user->email_verified_at = Carbon::now();
        }
        
        $user->save();

        Auth::login($user);
    }
}