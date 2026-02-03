@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-book"></i> Book Details</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Title:</strong></div>
                    <div class="col-md-9">{{ $book->title }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Author:</strong></div>
                    <div class="col-md-9">
                        <a href="{{ route('authors.show', $book->author) }}">{{ $book->author->name }}</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>ISBN:</strong></div>
                    <div class="col-md-9">{{ $book->isbn }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Published Year:</strong></div>
                    <div class="col-md-9">{{ $book->published_year }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Description:</strong></div>
                    <div class="col-md-9">{{ $book->description ?? 'N/A' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Created:</strong></div>
                    <div class="col-md-9">{{ $book->created_at->format('M d, Y') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Updated:</strong></div>
                    <div class="col-md-9">{{ $book->updated_at->format('M d, Y') }}</div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
