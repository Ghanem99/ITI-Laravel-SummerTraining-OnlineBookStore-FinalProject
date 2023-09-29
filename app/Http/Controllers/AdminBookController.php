<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class AdminBookController extends Controller
{
    public function create() 
    {
        return view('admin/books/create');
    }

    public function store()
    {
        $book = Book::create([
            'title' => request('title'),
            'description' => request('description'),
        ]);

        return redirect('/admin/books');
    }

    public function edit(Book $book)
    {
        return view('admin/books/edit', ['book' => $book]);
    }   
    
    public function update(Book $book)
    {
        $book->update([
            'title' => request('title'),
            'description' => request('description'),
        ]);

        return redirect('/admin/books');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/admin/books');
    }

}
