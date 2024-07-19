<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Dd;

class Usercontroller extends Controller
{
    public function login(){
        return view('user.login');
    }
    public function register(){
        return view('user.register');
    }
    public function postregister(Request $req){
        // $name = $req->input('name');
        $email = $req->input('email');
        // $password = $req->input('password'); 
        $user= User::where('email', $email)->first();
       
        // $user = new User();
        // $user->name = $name;
        // $user->email = $email;
        // $user->password = $password;
        // $user->save();
        if(isset($user)){
            session()->put('message','Email đã tồn tại');
            return back();
        }
    $req->merge(['password'=>Hash::make($req->password)]);
        try {
            User::create($req->all());
        } catch (\Throwable $th) {
            dd($th);
        }
        // dd($req->all());
        return redirect()->route('login');

    }

    public function postlogin(Request $req){
        $email  = $req->input('email');
        $password = $req->input('password'); 
        $user = User::where('email', $email)->first();
        $canLogin=false;
        if(isset($user)){
            $canLogin = Hash::check($password, $user->password);
        }
        if($canLogin){
            Auth::login($user);
            return redirect()->route('home');
        }
        else{
            session()->put('message','Email  hoặc mật khẩu không đúng');
            return back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
