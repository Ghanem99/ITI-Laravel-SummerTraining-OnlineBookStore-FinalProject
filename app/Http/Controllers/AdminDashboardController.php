<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function users()
    {
        $users = User::all();
        
        return view('admin/users', ['users' => $users]);
    }

    public function books()
    {
        $books = Book::all();

        return view('admin/books', ['books' => $books]);
    }

    public function returnedBooks()
    {
        // from the borrowed books where returned-date is not null
        $returnedBooks = BorrowedBook::whereNotNull('returned_at')->get();

        return view('admin/returned-books', ['returnedBooks' => $returnedBooks]);
    }

    public function borrowedBooks()
    {
        $borrowedBooks = BorrowedBook::all();

        return view('admin/borrowed-books', ['borrowedBooks' => $borrowedBooks]);
    }


}
