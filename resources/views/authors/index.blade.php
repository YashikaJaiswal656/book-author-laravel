@extends('layouts.app')

@section('title', 'Authors List')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-people"></i> Authors</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('authors.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Author
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($authors->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Bio</th>
                            <th>Books Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->email }}</td>
                                <td>{{ Str::limit($author->bio, 50) }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $author->books->count() }} books</span>
                                </td>
                                <td>
                                    <a href="{{ route('authors.show', $author) }}" class="btn btn-sm btn-info btn-action">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-warning btn-action">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('authors.destroy', $author) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Are you sure you want to delete this author?')">
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
                <p class="mt-3 text-muted">No authors found. <a href="{{ route('authors.create') }}">Create one now</a></p>
            </div>
        @endif
    </div>
</div>
@endsection
