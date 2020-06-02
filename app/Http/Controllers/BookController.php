<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Eloquent;
use File;
use App\Books;
use App\BookCategory;

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
        $category = BookCategory::all()->toArray();
        return view('books.add', compact('category'));
    }

    public function store(Request $req){
<<<<<<< HEAD
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

=======
        $data = DB::table('books')->get();
        
        $bookCode = null;
        if($data->count() > 0){// Get the last book code
            $lastBookCode = Books::orderBy('book_code', 'desc')->first()->book_code;
    
            // Get last 3 digits of last book code=
            $lastIncreament = substr($lastBookCode, 1);
    
            // Make a new order id with appending last increment + 1
            $bookCode = str_pad($lastIncreament + 1, 4, 0, STR_PAD_LEFT);
        }
        else{
            $bookCode = '0001';
        }
        
>>>>>>> e216efe80d837f43bd829d6c59461772391b640b
        $this->validate($req,[
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'isbn' => 'required',
            'publisher' => 'required',
            'total_page' => 'required',
            'book_category' => 'required',
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
<<<<<<< HEAD
                'id_book_category' => 1,
=======
                'total_page' => $req->total_page,
                'id_book_category' => $req->book_category,
>>>>>>> e216efe80d837f43bd829d6c59461772391b640b
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
<<<<<<< HEAD
                'id_book_category' => 1,
=======
                'total_page' => $req->total_page,
                'id_book_category' => $req->book_category,
>>>>>>> e216efe80d837f43bd829d6c59461772391b640b
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
        // $book = Books::where('book_code',$bookCode)->get();
        $book = DB::table('books')
                ->where('book_code',$bookCode)
                ->join('book_category', 'book_category.id_category', 'books.id_book_category')
                ->get();

        return view('books.detail', ['book' => json_decode($book, true)]);
        // return $book;
        // return json_decode($book, true);
    }

    public function edit($bookCode){
        // $book = Books::where('book_code',$bookCode)->paginate();
        $book = DB::table('books')
                ->where('book_code',$bookCode)
                ->join('book_category', 'book_category.id_category', 'books.id_book_category')
                ->get();

        $category = BookCategory::all()->toArray();

        return view('books.edit', ['book' => json_decode($book, true)], compact('category'));
    }
    
    public function update(Request $req){
        $this->validate($req,[
            'book_code' => 'required',
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'isbn' => 'required',
            'publisher' => 'required',
            'total_page' => 'required',
            'book_category' => 'required',
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
                'total_page' => $req->total_page,
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
                'total_page' => $req->total_page,
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

        if($req->book_category != "" && $req->book_category != 'Select choice'){
            //If book category not null
            DB::table('books')->where('book_code', $bookCode)->update([
                'id_book_category' => $req->book_category,
                'updated_at' => now()
            ]);
        }

        return redirect('/book');
    }

}
