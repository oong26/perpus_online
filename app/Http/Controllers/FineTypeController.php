<?php

namespace App\Http\Controllers;

use App\FineType;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FineTypeController extends Controller
{
    public function index(){
        $data = FineType::all()->toArray();
        return view('fine-type.index', compact('data'));
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

    public function edit($id_fine_type){
        $data = DB::table('fine_type')->where('id_fine_type', $id_fine_type)->get();

        return view('fine-type.edit', ['data' => $data]);
    }

    public function update(Request $req){
        $this->validate($req,[
            'id_fine_type' => 'required',
            'fine' => 'required',
            'type' => 'required'
        ]);
        
        DB::table('fine_type')
            ->where('id_fine_type', $req->id_fine_type)
            ->update([
                'fine' => $req->fine,
                'type' => $req->type]);

        return redirect('/fine-type');
    }

    public function delete($id_fine_type){
        DB::table('fine_type')->where('id_fine_type', $id_fine_type)->delete();

        return redirect('/fine-type');
    }
}
