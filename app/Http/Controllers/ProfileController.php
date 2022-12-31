<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\ResetsPasswords;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('created_at','asc');

        return view ('website.website.profile' ,compact('users'));
    }

    public function editProfile()
    {
        $model = User::findOrFail(auth()->user()->id);

        return view('website.website.edit-profile' ,compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users            = User::findOrFail($id);
        $users->username  = $request->username;
        $users->name      = $request->name;
        $users->lastname  = $request->lastname;
        $users->email     = $request->email;
        $users->user_type = $request->user_type;
        $users->phone     = $request->phone;
        $users->gender    = $request->gender;
        $users->address   = $request->address;
        $users->city      = $request->city;
        $users->country   = $request->country;
        $users->dob       = $request->dob;
        $users->bio       = $request->bio;
        $users->update();

        return redirect()->route('profile')
                        ->with('message','Profile Updated successfully.');
    }

    public function updateImg(Request $request, $id)
    {
        $users            = User::findOrFail($id);
        $users->avatar    = "/assets/website/images/".$request->avatar;
        $users->update();

        return redirect()->back()
                        ->with('message','Avatar Updated successfully.');
    }

    public function profileUpdatePassword(Request $request)
    {

        $rules = [
            'current_password'     => 'required|min:8|current_password',
            'password'             => 'required|confirmed|min:8',
        ];
        $message = [
            // validation current_password
            'current_password.required'                  => 'Please enter your current password!',
            'current_password.min'                       => 'Please enter at least 8 characters!',
            'current_password.current_password'          => 'Please enter your current password correctly!', // __('admin/request.current_password'),
            // validation password
            'password.required'                          => 'Please enter your new password!',
            'password.confirmed'                         => 'Please confirm your new password!',
            'password.min'                               => 'Please enter at least 8 characters!',

        ];
        $this->validate($request, $rules, $message);

        $user = $request->user();
        if ($request->password != '') {
            if (Hash::check($request->input('current_password'), $user->password)) {
                // The passwords match...
                $user->password = bcrypt($request->input('password'));
                $user->save();
            } else {
                return redirect()->route('User')
                    ->with(['error' => 'The current password is incorrect, try again!']);
            }
        }
        return redirect()->route('editProfile')
            ->with(['user_password_updated_message' => "Your password has been successfully changed!"]);
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

}
