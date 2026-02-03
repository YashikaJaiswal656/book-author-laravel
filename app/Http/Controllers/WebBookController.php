<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class WebBookController extends Controller
{
    /**
     * Display a listing of books.
     */
    public function index()
    {
        
        $books = Book::with('author')->latest()->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created book.
     */
    public function store(StoreBookRequest $request)
    {
        Book::create($request->validated());
        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book)
    {
        $book->load('author');
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified book.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified book.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
