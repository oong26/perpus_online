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
        $user_code = session()->get('user_code');
        if($user_code != null){
            return redirect('dashboard');
        }
        else{
            return view('index');
        }
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
                if($data->is_active == 1){
                    Session::put('user_code', $data->user_code);
                    Session::put('name', $data->name);
                    Session::put('username', $data->username);
                    Session::put('email', $data->email);
                    Session::put('role', $data->role);
                    Session::put('login',TRUE);
                    Session::put('img', $data->img);
                    // $nameArray = explode(' ', $data->name);
                    // $size = sizeof($nameArray);
                    // $count = 0;
                    // $da = "Muhammad";
                    // for($i = 1; $i <= $size; $i++){
                    //     $count++;
                    //     // if($count > 2){
                    //     //     $result = $nameArray[0] . ' ' . $nameArray[1];
                            
                    //     //     return ['result' => $result];
                    //     // }
                    //     // $da = $nameArray[$i];
                    //     // $count = $i;
                    // }
                    // return $count;
                    // return $nameArray[$size - 1];
                    

                    // return ['data' => $nameArray, 'size' => $size];
                    return redirect('dashboard');
                }
                else{
                    echo('Akun belum aktif!harap hubungi admin');
                    return redirect('/');
                }
            }
            else{
                echo('password salah');
                return redirect('/');
            }
        }

        return $data;
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

}
