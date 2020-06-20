<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Role;

class RoleController extends Controller
{
    public function index(){
        $data = Role::all()->toArray();
        
        return view('role.index', compact('data'));
    }

    public function add(){
        return view('role.add');
    }

    public function store(Request $req){
    	$this->validate($req,[
    		'role' => 'required'
    	]);

    	DB::table('role')->insert(['role' => $req->role]);

        return redirect('/role');
    }

    public function edit($id_role){
        $data = DB::table('role')->where('id_role', $id_role)->get();
        
        return view('role.edit', ['data' => $data]);
    }

    public function update(Request $req){
        $this->validate($req,[
            'id_role' => 'required',
            'role' => 'required'
        ]);

        DB::table('role')->where('id_role', $req->id_role)->update(['role' => $req->role]);

        return redirect('/role');
    }

    public function delete($id_role){
        DB::table('role')->where('id_role', $id_role)->delete();

        return redirect('/role');
    }
}
