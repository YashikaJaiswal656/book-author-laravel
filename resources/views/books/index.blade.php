@extends('layouts.app')

@section('title', 'Books List')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-book"></i> Books</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Book
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($books->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Year</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>
                                    <a href="{{ route('authors.show', $book->author) }}">
                                        {{ $book->author->name }}
                                    </a>
                                </td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->published_year }}</td>
                                <td>
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info btn-action">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning btn-action">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Are you sure you want to delete this book?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                <p class="mt-3 text-muted">No books found. <a href="{{ route('books.create') }}">Create one now</a></p>
            </div>
        @endif
    </div>
</div>
@endsection
