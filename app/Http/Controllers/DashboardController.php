<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\BorrowedBook;


class DashboardController extends Controller
{
    public function index() 
    {
        // return only if the book is not returned
        $books = BorrowedBook::where('is_returned', 0)->get();

        return view('user/dashboard', [
            'books' => $books
        ]);
    }
}
