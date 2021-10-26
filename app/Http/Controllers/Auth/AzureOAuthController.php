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

            $user->email = $data->user['userPrincipalName'];
            $user->provider = "azure";
            $user->provider_id = $data->user['id'];
            $user->email_verified_at = Carbon::now();
        }
        $user->name = $data->user['displayName'];
        
        $user->save();

        Auth::login($user);
    }
}