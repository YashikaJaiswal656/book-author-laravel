@extends('layouts.app')

@section('title', 'Author Details')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-person"></i> Author Details</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Name:</strong></div>
                    <div class="col-md-9">{{ $author->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Email:</strong></div>
                    <div class="col-md-9">{{ $author->email }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Bio:</strong></div>
                    <div class="col-md-9">{{ $author->bio ?? 'N/A' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Created:</strong></div>
                    <div class="col-md-9">{{ $author->created_at->format('M d, Y') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Updated:</strong></div>
                    <div class="col-md-9">{{ $author->updated_at->format('M d, Y') }}</div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0"><i class="bi bi-book"></i> Books ({{ $author->books->count() }})</h5>
            </div>
            <div class="card-body">
                @if($author->books->count() > 0)
                    <ul class="list-group">
                        @foreach($author->books as $book)
                            <li class="list-group-item">
                                <a href="{{ route('books.show', $book) }}">{{ $book->title }}</a>
                                <br>
                                <small class="text-muted">{{ $book->published_year }}</small>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted text-center">No books yet</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
