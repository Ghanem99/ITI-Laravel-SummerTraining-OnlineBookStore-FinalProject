<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BorrowedBook;

class ReturnedBookController extends Controller
{
    public function index()
    {
        $returnedBooks = BorrowedBook::where('is_returned', 1)->get();

        return view('user/returned-books', ['books' => $returnedBooks]);
    }
}
