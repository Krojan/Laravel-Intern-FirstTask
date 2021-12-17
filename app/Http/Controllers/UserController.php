<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('register_user');
    }

    public function store(){

        $details=request()->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required | min: 8 | max: 20'
        ]);
//        $details['password']=bcrypt(\request()->get('password'));
        $user=User::create($details);
        auth()->login($user);
        return 'new user register and logged';
    }

    public function list(){
        $users=User::all();

        return view('user.list',compact('users'))->with('name', "user");
    }

    public function profile(){
        $userId=auth()->id();
        $user=User::find($userId);
        return view('user.profile')->with('user', $user);
    }

    public function login(){
        return view ('login');
    }
    public function logoutUser(){
        auth()->logout();
        return redirect('/');
    }
    public function logUser(){

        $attributes=\request()->validate([
            'email'=>'required | email',
            'password'=>'required | min:8 | max:20'
        ]);

        if(auth()->attempt($attributes)){
            \request()->session()->regenerate();
//            echo 'login success';
            return redirect('/');
            }
        return "incorrect credentials";
    }
    public  function edit($id){
        return view('user.edit', ['user'=>User::find($id) ]);
    }
    public function update(Request $request,  $id){
        $attr=$request->validate([
            'name'=>'required|max:20',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user=User::find($id);
        $user->name=$attr['name'];
        $user->email=$attr['email'];
        $user->password=$attr['password'];
        $user->save();
        return redirect()->route('user_list')->with("success", "user data updated");
    }
    public function delete($id){
        if(auth()->id() == $id){
            return "can not delete yourself";
        }
        else{
            User::find($id)->delete();
            return redirect('/')->with('success', "delete success");
        }

    }

}

