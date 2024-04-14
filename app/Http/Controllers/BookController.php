<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index() 
    {
        return view('user.books', [
            'books' => Book::all()
        ]);
    }
}
