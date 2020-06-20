<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookGenre;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index(){
        $data = BookGenre::all()->toArray();
        return view('book_genre.index', compact('data'));
    }

    public function add(){
        return view('book_genre.add');
    }

    public function store(Request $req){
        $this->validate($req, ['genre' => 'required']);

        DB::table('book_genre')->insert([
            'book_genre' => $req->genre
        ]);

        return redirect('/book-genre');
    }

    public function edit($id){
        $data = DB::table('book_genre')->where('id_genre', $id)->get();

        return view('book_genre.edit', ['data' => $data]);
    }

    public function delete($id){
        DB::table('book_genre')->where('id_genre', $id)->delete();

        return redirect('/book-genre');
    }
}
