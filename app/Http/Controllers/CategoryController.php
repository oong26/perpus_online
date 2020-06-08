<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookCategory;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $data = BookCategory::all()->toArray();
        return view('book_category.index', compact('data'));
    }

    public function edit($id){
        $data = DB::table('book_category')->where('id_category', $id)->get();

        return view('book_category.edit', ['data' => $data]);
    }

    public function delete($id){
        DB::table('book_category')->where('id_category', $id)->delete();

        return redirect('/book-category');
    }
}
