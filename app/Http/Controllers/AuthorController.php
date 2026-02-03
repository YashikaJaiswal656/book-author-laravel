<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    /**
     * Display a listing of authors.
     */
    public function index(): JsonResponse
    {
        $authors = Author::with('books')->get();
        
        return response()->json([
            'success' => true,
            'data' => $authors
        ], 200);
    }

    /**
     * Store a newly created author.
     */
    public function store(StoreAuthorRequest $request): JsonResponse
    {
        $author = Author::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'data' => $author
        ], 201);
    }

    /**
     * Display the specified author.
     */
    public function show(Author $author): JsonResponse
    {
        $author->load('books');

        return response()->json([
            'success' => true,
            'data' => $author
        ], 200);
    }

    /**
     * Update the specified author.
     */
    public function update(UpdateAuthorRequest $request, Author $author): JsonResponse
    {
        $author->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully',
            'data' => $author
        ], 200);
    }

    /**
     * Remove the specified author.
     */
    public function destroy(Author $author): JsonResponse
    {
        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully'
        ], 200);
    }
}
