<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Users;

class ProfileController extends Controller
{
    public function index(){
        $user_code = session()->get('user_code');
        if($user_code != null){
            $data = DB::table('users')
                    ->where('user_code', $user_code)
                    ->join('role', 'role.id_role', '=', 'users.id_role')
                    ->get();
            
            return view('profile', ['data' => $data]);
        }
        return view('profile');
    }

    public function update(){
        $user_code = session()->get('user_code');
        if($user_code != null){
            $data = Users::where('user_code', $user_code)->first();

            return $data;
        }
        return 'else';
    }

    public function changePassword(){
        return view('change-password');
    }

    public function updatePassword(Request $req){
        $user_code = session()->get('user_code');
        if($user_code != null){
            $this->validate($req,[
                'old_password' => 'required',
                'new_password' => 'required'
            ]);
    
            $input_old_password = $req->old_password;
            $new_password = Hash::make($req->new_password);
    
            $oldPass = Users::where('user_code', $user_code)->first()->password;
            if(Hash::check($input_old_password, $oldPass)){
                DB::table('users')->where('user_code', $user_code)->update([
                    'password' => $new_password,
                    'updated_at' => now()]);

                return redirect('dashboard');
            }
            else{
                return 'password tidak sesuai';
            }
        }
        else{
            return redirect('/');
        }

        return redirect('dashboard');
    }
}
