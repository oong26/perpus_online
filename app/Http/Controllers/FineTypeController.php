<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FineTypeController extends Controller
{
    public function index(){
        return view('fine-type.index');
    }

    public function add(){
        return view('fine-type.add');
    }

    public function store(Request $request){
        $fine = $request->fine;
        $type = $request->type;

        DB::table('fine_type')->insert([
            'fine' => $fine,
            'type' => $type
        ]);

        return redirect('/fine-type');
    }
}
