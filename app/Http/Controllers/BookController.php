<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * Display a listing of books.
     */
    public function index(): JsonResponse
    {
        $books = Book::with('author')->get();
        
        return response()->json([
            'success' => true,
            'data' => $books
        ], 200);
    }

    /**
     * Store a newly created book.
     */
    public function store(StoreBookRequest $request): JsonResponse
    {
        $book = Book::create($request->validated());
        $book->load('author');

        return response()->json([
            'success' => true,
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book): JsonResponse
    {
        $book->load('author');

        return response()->json([
            'success' => true,
            'data' => $book
        ], 200);
    }

    /**
     * Update the specified book.
     */
    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        $book->update($request->validated());
        $book->load('author');

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully',
            'data' => $book
        ], 200);
    }

    /**
     * Remove the specified book.
     */
    public function destroy(Book $book): JsonResponse
    {
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully'
        ], 200);
    }
}
