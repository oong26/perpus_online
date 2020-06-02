<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
