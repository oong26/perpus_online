<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Users;

class LoginController extends Controller
{
    public function index(){
        return view('index');
    }

    public function loginPost(Request $req){
        $username = $req->username;
        $password = $req->password;
        $data = Users::where('username', $username)
        ->orWhere('email', $username)
        ->orWhere('phone', $username)
        ->join('role', 'role.id_role', 'users.id_role')
        ->first();
        if($data){
            if(Hash::check($req->password, $data->password)){
                Session::put('user_code', $data->user_code);
                Session::put('name', $data->name);
                Session::put('username', $data->username);
                Session::put('email', $data->email);
                Session::put('role', $data->role);
                Session::put('login',TRUE);
                Session::put('img', $data->img);
                return redirect('dashboard');
            }
            else{
                return ['sha1' => sha1($password),
                        'hash' => Hash::make($req->password),
                        'password' => $data->password];
            }
        }
        return $data;
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

}
