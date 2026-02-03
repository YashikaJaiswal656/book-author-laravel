<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;

class WebAuthorController extends Controller
{
    /**
     * Display a listing of authors.
     */
    public function index()
    {
        $authors = Author::with('books')->latest()->get();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new author.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created author.
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create($request->validated());
        return redirect()->route('authors.index')->with('success', 'Author created successfully!');
    }

    /**
     * Display the specified author.
     */
    public function show(Author $author)
    {
        $author->load('books');
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified author.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified author.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());
        return redirect()->route('authors.index')->with('success', 'Author updated successfully!');
    }

    /**
     * Remove the specified author.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully!');
    }
}
