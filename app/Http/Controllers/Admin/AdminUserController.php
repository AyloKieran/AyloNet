<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {
        $search = request()->input('search');

        $users = User::orderBy('created_at', 'DESC')
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->orWhere('provider_id', 'like', '%' . $search . '%')
            ->paginate(30)->withQueryString();
        return view('admin.users.index')->with('users', $users);
    }

    public function edit(User $user) {
        return view('admin.users.edit')->with('user', $user);
    }

    public function updateAvatar(User $user)
    {
        if($user->provider == "aylo.net") {
            $attributes = request()->validate([
                'avatar' => ['file', 'max:2560', 'mimes:jpeg,png,bmp,tiff,webp']
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

    public function updateDetails(User $user)
    {
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

    public function updatePassword(User $user)
    {
        if($user->provider == "aylo.net") {
            $attributes = request()->validate([
                'password' => ['min:6', 'confirmed'],
            ]);
            
            $user->password = \Hash::make(request('password'));
            $user->save();

            return back();
        } else {
            return abort(403);
        }        
    }

    public function updateRole(User $user)
    {      
        $user->user_role = request('role');
        $user->save();

        return back();    
    }

    public function sendVerificationEmail(User $user)
    {
        if($user->provider == "aylo.net") {
            $user->sendEmailVerificationNotification();

            return back();
        } else {
            return abort(403);
        }   
        
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('admin.users'));
    }
}
