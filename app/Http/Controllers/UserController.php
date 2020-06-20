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
                
        return view('users.index', ['users' => $users]);
    }

    public function add(){
        $role = Role::all()->toArray();
        return view('users.add', compact('role'));
    }

    public function store(Request $request){
        // Get the last book code
        $data = DB::table('users')->get();

        $userCode = null;

        if($data->count() > 0){
            $lastUserCode = Users::orderBy('user_code', 'desc')->first()->user_code;

            // Get last 3 digits of last book code=
            $lastIncreament = substr($lastUserCode, 1);

            // Make a new order id with appending last increment + 1
            $userCode = str_pad($lastIncreament + 1, 4, 0, STR_PAD_LEFT);

        }
        else{
            $userCode = "0001";
        }

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
            'user_code' => 'U'.$userCode,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'id_role' => $request->role,
            'img' => 'U'.$userCode.$file->getClientOriginalName(),
            'is_active' => 1
        ]);

        $file->move($upload_path, 'U'.$userCode.$file->getClientOriginalName());

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
            'role' => 'required',
            'is_active' => 'required'
        ]);

        if($request->is_active == 'Select choice'){
            $is_active = 0;
        }
        else{
            $is_active = $request->is_active;
        }

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
                    'is_active' => $is_active,
                    'updated_at' => now()]);

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
                    'is_active' => $is_active,
                    'updated_at' => now()
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
                    'is_active' => $is_active,
                    'updated_at' => now()
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
        $path = public_path().'\uploaded_files\profile_photos\\'.$img;

        if($img != null){
            if(file_exists($path)){
                File::delete('uploaded_files/profile_photos/'.$img);
            }
        }

        return redirect('/user');
    }

}
