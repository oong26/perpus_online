<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Eloquent;
use File;
use App\Books;

class BookController extends Controller
{
    public function index(){
        $books = Books::all()
                    ->toArray();
        // $users = Users::leftJoin('role', 'users.id_role', '=', 'role.id_role')->();
        // return view('user', compact('users'));
        return view('books.index', compact('books'));
    }

    public function add(){
        return view('books.add');
    }

    public function store(Request $req){
        // Get the last book code
        $data = DB::table('books')
                ->get();

        $bookCode = null;

        if($data->count() > 0){
            $lastBookCode = Books::orderBy('book_code', 'desc')->first()->book_code;

            // Get last 3 digits of last book code=
            $lastIncreament = substr($lastBookCode, 1);

            // Make a new order id with appending last increment + 1
            $bookCode = str_pad($lastIncreament + 1, 4, 0, STR_PAD_LEFT);

        }
        else{
            $bookCode = "0001";
        }

        $this->validate($req,[
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'isbn' => 'required',
            'publisher' => 'required',
            'summary' => 'required',
            'stock' => 'required',
            'is_online' => 'required',
            'location' => 'required',
            'file' => 'required'
        ]);

        $file = $req->file('file');//Image Cover file
        $pdf = $req->file('pdf_file');
        $upload_path = 'uploaded_files/book_cover';
        $upload_path_pdf = 'uploaded_files/pdf_files';

        if($req->is_online == 'Yes'){
            DB::table('books')->insert([
                'book_code' => 'B'.$bookCode,
                'title' => $req->title,
                'author' => $req->author,
                'year' => $req->year,
                'isbn' => $req->isbn,
                'publisher' => $req->publisher,
                'id_book_category' => 1,
                'summary' => $req->summary,
                'stock' => $req->stock,
                'location' => $req->location,
                'is_available_online' => $req->is_online,
                'pdf_file' => 'B'.$bookCode.$pdf->getClientOriginalName(),
                'cover' => 'B'.$bookCode.$file->getClientOriginalName()
            ]);
    
            $file->move($upload_path, 'B'.$bookCode.$file->getClientOriginalName());
            $pdf->move($upload_path_pdf, 'B'.$bookCode.$pdf->getClientOriginalName());
        }
        elseif($req->is_online == 'No'){
            DB::table('books')->insert([
                'book_code' => 'B'.$bookCode,
                'title' => $req->title,
                'author' => $req->author,
                'year' => $req->year,
                'isbn' => $req->isbn,
                'publisher' => $req->publisher,
                'id_book_category' => 1,
                'summary' => $req->summary,
                'stock' => $req->stock,
                'location' => $req->location,
                'is_available_online' => $req->is_online,
                'cover' => 'B'.$bookCode.$file->getClientOriginalName()
            ]);

            $file->move($upload_path, 'B'.$bookCode.$file->getClientOriginalName());
        }
        else{
            return view('book.add');
        }
        
        return redirect('/book');
    }

    public function detail($bookCode){
        $book = Books::where('book_code',$bookCode)->paginate();

        return view('books.detail', ['book' => $book]);
    }

    public function edit($bookCode){
        $book = Books::where('book_code',$bookCode)->paginate();

        return view('books.edit', ['book' => $book]);
    }
    
    public function update(Request $req){
        $this->validate($req,[
            'book_code' => 'required',
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'isbn' => 'required',
            'publisher' => 'required',
            'summary' => 'required',
            'stock' => 'required',
            'is_online' => 'required',
            'location' => 'required'
        ]);

        $bookCode = $req->book_code;
        $file = $req->file('file');
        $pdf = $req->file('pdf_file');
        $upload_path = 'uploaded_files/book_cover';
        $upload_path_pdf = 'uploaded_files/pdf_files';

        if($pdf != null && $req->is_online != "" && $req->is_online != 'Select choice'){
            //Is online = YES
            $oldPdf = DB::table('books')->where('book_code', $bookCode)->first()->pdf_file;
            File::delete($upload_path_pdf.'/'.$oldPdf);

            DB::table('books')->where('book_code', $bookCode)->update([
                'title' => $req->title,
                'author' => $req->author,
                'year' => $req->year,
                'isbn' => $req->isbn,
                'publisher' => $req->publisher,
                'summary' => $req->summary,
                'stock' => $req->stock,
                'location' => $req->location,
                'is_available_online' => 'Yes',
                'pdf_file' => $bookCode.$pdf->getClientOriginalName(),
                'updated_at' => now()
            ]);
    
            $pdf->move($upload_path_pdf, $bookCode.$pdf->getClientOriginalName());
        }
        else{
            $oldPdf = DB::table('books')->where('book_code', $bookCode)->first()->pdf_file;
            if($oldPdf != null){
                File::delete($upload_path_pdf.'/'.$oldPdf);
            }
            //Is online = NO
            DB::table('books')->where('book_code', $bookCode)->update([
                'title' => $req->title,
                'author' => $req->author,
                'year' => $req->year,
                'isbn' => $req->isbn,
                'publisher' => $req->publisher,
                'summary' => $req->summary,
                'stock' => $req->stock,
                'location' => $req->location,
                'is_available_online' => 'No',
                'pdf_file' => null,
                'updated_at' => now()
            ]);
        }

        if($file != null){
            $oldCover = DB::table('books')->where('book_code', $bookCode)->first()->cover;
            if($oldCover != null){
                File::delete($upload_path.'/'.$oldCover);
            }
            DB::table('books')->where('book_code', $bookCode)->update([
                'cover' => $bookCode.$file->getClientOriginalName()
            ]);
    
            $file->move($upload_path, $bookCode.$file->getClientOriginalName());
        }

        return redirect('/book');
    }

}
