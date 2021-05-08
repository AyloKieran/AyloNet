<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.index');
    }

    public function updateAvatar()
    {
        $user = auth()->user();

        if($user->provider == "aylo.net") {
            $attributes = request()->validate([
                'avatar' => ['file', 'max:1024', 'mimes:jpeg,png,bmp,tiff,webp']
            ]);

            if(request('avatar')) {
                $avatar = request('avatar')->store('avatars');
    
                $user->avatar = 'storage/' . $avatar;
            } else {
                $user->avatar = NULL;
            }

            $user->save();

            return back();
        } else {
            return abort(403);
        }        
    }

    public function updateDetails()
    {
        $user = auth()->user();

        if($user->provider == "aylo.net") {
            $attributes = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            ]);

            $user->name = request('name');
            $user->email = request('email');
            $user->email_verified_at = NULL;
            $user->save();

            $user->sendEmailVerificationNotification();

            return back();
        } else {
            return abort(403);
        }        
    }

    public function updatePassword()
    {
        $user = auth()->user();

        if($user->provider == "aylo.net") {
            $attributes = request()->validate([
                'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                    if (!\Hash::check($value, $user->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }],
                'password' => ['min:6', 'confirmed'],
            ]);
            
            $user->password = \Hash::make(request('password'));
            $user->save();

            return back();
        } else {
            return abort(403);
        }        
    }

    public function sendVerificationEmail()
    {
        $user = auth()->user();

        if($user->provider == "aylo.net") {
            $user->sendEmailVerificationNotification();

            return back();
        } else {
            return abort(403);
        }   
        
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->delete();
        return redirect(route('home'));
    }
}
