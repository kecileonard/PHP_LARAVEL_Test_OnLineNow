<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\AddUserFormRequest;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    public function users()
    {
    	$users = User::all();

    	return view('admin.users.index',compact('users'));
    }

    public function view($id)
    {
    	$user = User::find($id);
    	return view('admin.users.view',compact('user'));
    }

    public function create()
    {
    	return view('admin.users.create');
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'first_name'        =>  ['required', 'string', 'max:255'],
                'last_name'         =>  ['required', 'string', 'max:255'],
                'username'          =>  ['required', 'string', 'max:255','unique:users'],
                'email'             =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
                //'password'          =>  'required|confirmed|min:8'
                'password' => ['required','confirmed',Password::min(8)],
                'password_confirmation' => 'required|same:password'

            ]
        );

        $dataArray = array(
            "first_name" => $request->first_name,
            "last_name"  => $request->last_name,
            "username"   => $request->username,
            "email"      => $request->email,
            "password"   => Hash::make($request->password)
        );

        $user = User::create($dataArray);
        if(!is_null($user))
        {
            return redirect('/users')->with('status',"User created successfully");
        }

        else
        {
            return back()->with("error", "Alert! Failed to register");
        }

    }

    //Another version of store  with AddUserFormRequest
    /*
    public function store(AddUserFormRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        if(!is_null($user))
        {
            return redirect('/users')->with('status',"User created successfully");
        }
        else
        {
            return back()->with("error", "Alert! Failed to register");
        }
    }
    */

    public function edit($id)
    {
    	$user = User::find($id);

        if($user)
        {
            return view('admin.users.edit',compact('user'));

        }
        else
        {
            return redirect()->back()->with('error', "The link you followed was broken ");

        }

    }


    public function update(Request $request ,$id)
    {
    	$user = User::find($id);

        if($user)
        {
            $request->validate(
                [
                    'first_name' =>  ['required', 'string', 'max:255'],
                    'last_name'  =>  ['required', 'string', 'max:255'],
                    'username'   =>  ['required', 'string', 'max:255','unique:users,username,'.$user->id],
                    'email'      =>  ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
                    'password'   =>  ['nullable','confirmed', Password::min(8)],
                    'role_as'    =>  'nullable|integer|max:1',
                ]
            );


            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email'  => $request->email

            ]);


            $user->role_as = $request->role_as;
            $user->update();


            if($request->password)
            {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return redirect('/users')->with('status',"User updated successfully");

        }
        else
        {
            return redirect()->back()->with('error', "The link you followed was broken ");
        }

    }

    public function delete($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return redirect('/users')->with('success',"User deleted successfully");
    }


}
