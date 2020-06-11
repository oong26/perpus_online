<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Books;
use App\Users;
use App\Loans;

class DashboardController extends Controller
{
    public function index(){
        $books = DB::table('books')->get();
        $users = DB::table('users')->get();
        $loans = DB::table('loans')->where('status', 'Borrowed')->get();
        $loan = DB::table('loans')
                ->join('users', 'users.user_code', 'loans.user_code')
                ->join('books', 'books.book_code', 'loans.book_code')->get();
        
        // return $loan;
        return view('dashboard.index', ['books' => $books->count(),
                                        'users' => $users->count(),
                                        'loans' => $loans->count()], ['loan' => $loan]);
    }
}
