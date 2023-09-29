<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\BorrowedBook;

class BookController extends Controller
{
    public function index() 
    {
        return view('user/books', [
            'books' => Book::all()
        ]);
    }

    // function to return the book
    public function return(Book $book) 
    {

        BorrowedBook::where('book_id', $book->id)->update([
            'is_returned' => 1,
            'returned_at' => now()
        ]);

        return redirect('/books');
    }

    public function borrow(Book $book) 
    {
        BorrowedBook::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowed_at' => now(), 
        ]);

        return redirect('/books');
    }

    public function showReturnedBooks() 
    {
        return view('user/returned-books', [
            'books' => BorrowedBook::where('is_returned', 1)->distinct()->get()
        ]);
    }
}
