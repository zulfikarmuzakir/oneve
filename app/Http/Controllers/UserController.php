<?php

namespace App\Http\Controllers;

use App\Models\FavoriteEvent;
use App\Models\Membership;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function stopPremium($id)
    {
        // dd(Auth::user()->membership->orderBy('membership_type')->first()->id);
        // dd(Membership::find($id));
        $membership = Membership::find($id);
        $membership->expire_at = date('Y/m/d');
        $membership->save();

        return redirect()->back();
    }

    public function joinPremium($id)
    {
        // dd(Auth::user()->membership->orderBy('membership_type')->first()->expire_at);
        // dd(Auth::user()->membership->orderBy('membership_type')->first());
        $user_id = Auth::user()->id;

        $membership = Membership::create([
            'user_id' => $user_id,
            'membership_type' => "premium",
            'start_at' => date('Y/m/d'),
            'expire_at' =>date('Y/m/d', strtotime('30 days')),
        ]);

        return redirect()->back();
    }

    public function eventLike($id)
    {
        $user_id = Auth::user()->id;

        $favorite = FavoriteEvent::create([
            'user_id' => $user_id,
            'event_id' => $id,
            'status' => "favorited"
        ]);

        return redirect()->back();
    }

    public function eventNotLike($id)
    {
        // dd($id);
        $favorite = FavoriteEvent::where('event_id', $id)->where('user_id', Auth::user()->id)->first();
        $favorite->delete();

        return redirect()->back();
    }

    public function update(Request $request)
    {   

        $id = Auth::user()->id;

       
        // dd($request->identity_card);
        $imageName = null;
        if ($request->identity_card != null) {
            $imageName = time().'.'.$request->identity_card->extension();  
            $request->identity_card->move(public_path('img/profile'), $imageName);
        }


        

        // dd($request->all());

        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $finduser = Profile::where('user_id', $id)->first();

        if ($finduser) {
            $profile = Profile::find($id);
            $profile->phone_number = $request->phone_number;
            $profile->nik = $request->nik;
            $profile->agency_name = $request->agency_name;
            $profile->person = $request->person;
            $profile->identity_card = $imageName;
            $profile->save();
        } else {
            $profile = Profile::create([
                'user_id' => $id,
                'phone_number' => $request->phone_number,
                'nik' => $request->nik,
                'agency_name' => $request->agency_name,
                'person' => $request->person,
                'identity_card' => $imageName, 
            ]);
        }

        // dd(Profile::all());

        return redirect()->back();
    }

    public function show($slug)
    {
        $user = User::where('slug_name', $slug)->first();
        // dd($user->events);
        $user->increment('profile_viewer', 1);

        return view("profile.profile", compact('user'));
    }

    public function edit_password()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('profile.dashboard.change-password', compact('user'));
    }
    
    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $user_password = $user->password;

        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);

        if (!Hash::check($request->current_password, $user_password)) {
            return back()->withErrors(['current_password'=>'password not match']);
        }

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success','Sukses, kata sandi anda berhasil diubah');
    }
}
