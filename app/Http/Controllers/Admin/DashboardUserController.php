<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','asc')->paginate(30);

        return view('Admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required',  'confirmed'],
            'user_type' => ['required', 'in:vendor,customer,admin,moderator'],
            'gender' => ['required', 'in:male,female,undetermined'],
            'phone' => ['required', 'string'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'user_type' => $request->user_type,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ]);


        if(! empty($request->users)) {
            $user->assignRole($request->users);
        }
        return redirect()->route('users.index')
                        ->with('message','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::findOrFail($id);

        if(auth()->user()->user_type == "admin" && $model->id == auth()->user()->id){
            return view('Admin.users.edit',compact('model'));
        }
        elseif(auth()->user()->user_type == "admin" && $model->user_type == "admin"){
            return redirect('/dashboard/users');
        }
        elseif(auth()->user()->user_type == "admin" && $model->user_type != "admin"){
            return view('Admin.users.edit',compact('model'));
        }
        elseif(auth()->user()->user_type == "moderator"){
            return redirect('/dashboard/users');
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }

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
        $users->name      = $request->name;
        $users->lastname  = $request->lastname;
        $users->username  = $request->username;
        // $user->avatar     = $request->avatar;
        $users->user_type = $request->user_type;
        $users->save();

        return redirect()->route('users.index')
                        ->with('message','User Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('users.index')
            ->with(['message' => "($users->name) - Deleted successfully!"]);
    }

    // public function destroy(User $user)
    // {
    //     $user->delete();

    //     return redirect()->route('user.index')
    //                     ->with('message','User deleted successfully');
    // }

    public function delete()
    {
        $users = User::orderBy('created_at','asc')->onlyTrashed()->paginate(30);
        return view('Admin.users.delete',compact('users'));
    }

    public function forceDelete($id)
    {
        User::where('id', $id)->forceDelete();
        return redirect()->route('users.delete')
            ->with(['message' => "Permanently deleted successfully!"]);
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        $users = User::findOrFail($id);
        return redirect()->route('users.delete')
            ->with(['message' => "($users->name) - Restored successfully!"]);
    }
}
