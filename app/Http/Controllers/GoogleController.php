<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membership;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {

        // session(['role' => request()->input('role')]);
        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback()
    {
        try {

            // $role = session()->get('role');

            $user = Socialite::driver('google')->user();

            // dd($user);

            $finduser = User::where('google_id', $user->getId())->first();

            if($finduser) {
                Auth::login($finduser);

                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                $slug = Str::slug($user->name, '-');


                $newUser = new User;
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->avatar = $user->avatar;
                $newUser->login_type = "google";
                $newUser->google_id = $user->id;
                $newUser->password = bcrypt($user->id);
                $newUser->slug_name = $slug;
//                $newUser->slug_name = Str::slug($user->name, '-');
                $newUser->save();

                $membership = Membership::create([
                    'user_id' => $newUser->id,
                    'membership_type' => 'reguler',
                ]);

                Auth::login($newUser);
                return redirect()->intended(RouteServiceProvider::HOME);
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }


}
