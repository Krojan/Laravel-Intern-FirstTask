<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('register_user');
    }

    public function store(Request $request){
//        dd( $request->only(['name', 'email', 'password']));
        $details=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required | min: 8 | max: 20'
        ]);
//        dd($request->hasFile('image'));
        $user=User::create($request->only(['name', 'email', 'password']));
        if($request->hasFile('image')){
            if(
                $request->validate([
                'image'=>'mimes:jpeg, png'
                ])
            ){
                $image_name=uniqid(). '.' .$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('images'), $image_name);
                $user->image_name=$image_name;
                $user->save();
            }

        }
        return redirect()->back()->with('success',  "new user added");
//        return 'new user register and logged';
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
            return redirect()->back()->with('success', "delete success");
        }

    }

    //dashboard_user_add
//    public function store(Request $request){
//        $atrributes=$request->validate([
//            'name'=>'required|max:255|min:5',
//            'email'=>'required|email',
//            'password'=>'required|mim:6'
//        ]);
//        User::create($atrributes);
//
//    }
//

}

