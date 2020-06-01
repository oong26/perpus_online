<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Eloquent;
use App\Role;
use App\Users;
use File;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')
                ->join('role', 'role.id_role', 'users.id_role')
                ->orderBy('created_at', 'ASC')
                ->get();
        // $users = Users::leftJoin('role', 'users.id_role', '=', 'role.id_role')->();
        // return view('user', compact('users'));
        return view('users.index', ['users' => $users]);
    }

    public function add(){
        $role = Role::all()->toArray();
        return view('users.add', compact('role'));
    }

    public function store(Request $request){
        // Get the last order id
        $lastorderId = Users::orderBy('user_code', 'desc')->first()->user_code;

        // Get last 3 digits of last order id
        $lastIncreament = substr($lastorderId, 1);

        // Make a new order id with appending last increment + 1
        $newOrderCode = str_pad($lastIncreament + 1, 4, 0, STR_PAD_LEFT);
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        // $role = $request->role;
        // if($role == )
        
        $file = $request->file('file');
        $upload_path = 'uploaded_files/profile_photos';

        DB::table('users')->insert([
            'user_code' => 'U'.$newOrderCode,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'id_role' => $request->role,
            'img' => 'U'.$newOrderCode.$file->getClientOriginalName()
        ]);

        $file->move($upload_path, 'U'.$newOrderCode.$file->getClientOriginalName());

        return redirect('/user');
    }

    public function edit($user_code){
        $data = DB::table('users')
                ->where('user_code', $user_code)
                ->join('role', 'role.id_role', 'users.id_role')
                ->get();

        $role = Role::all()->toArray();

        return view('users.edit', ['users' => $data], compact('role'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required'
        ]);

       try{
            $file = $request->file('file');
            $upload_path = 'uploaded_files/profile_photos';
            if($file != null){
                $oldImg = DB::table('users')->where('user_code', $request->user_code)->first()->img;
                File::delete('uploaded_files/profile_photos/'.$oldImg);

                DB::table('users')->where('user_code', $request->user_code)->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'id_role' => $request->role,
                    'img' => $request->user_code.$file->getClientOriginalName(),
                    'updated_at' => now()
                    // 'updated_at' => Carbon::now()->toDateTimeString()
                ]);
                $file->move($upload_path, $request->user_code.$file->getClientOriginalName());
                $request->session()->put('img', $request->user_code.$file->getClientOriginalName());
            }
            elseif($file != null && $request->password != null){
                $oldImg = DB::table('users')->where('user_code', $request->user_code)->first()->img;
                File::delete('uploaded_files/profile_photos/'.$oldImg);

                DB::table('users')->where('user_code', $request->user_code)->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'id_role' => $request->role,
                    'img' => $request->user_code.$file->getClientOriginalName(),
                    'updated_at' => now()
                    // 'updated_at' => Carbon::now()->toDateTimeString()
                ]);
                $file->move($upload_path, $request->user_code.$file->getClientOriginalName());
                $request->session()->put('img', $request->user_code.$file->getClientOriginalName());
            }
            else{
                DB::table('users')->where('user_code', $request->user_code)->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'id_role' => $request->role,
                    'updated_at' => now()
                    // 'updated_at' => Carbon::now()->toDateTimeString()
                ]);
            } 

            if($request->password != null){
                DB::table('users')->where('user_code', $request->user_code)->update([
                    'password' => Hash::make($request->password)
                ]);
            }
            return redirect('/user');
       }
       catch(Exception $ex){
           return abort(404);
       }

        return redirect('/user');
    }

    public function delete($user_code, $img){
        DB::table('users')->where('user_code', $user_code)->delete();
        File::delete('uploaded_files/profile_photos/'.$img);

        return redirect('/user');
    }

}
