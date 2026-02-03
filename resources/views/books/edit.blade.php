@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="mb-0"><i class="bi bi-pencil"></i> Edit Book</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('books.update', $book) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $book->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author_id" class="form-label">Author <span class="text-danger">*</span></label>
                        <select class="form-select @error('author_id') is-invalid @enderror" 
                                id="author_id" name="author_id" required>
                            <option value="">Select an author</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" 
                                    {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('author_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('isbn') is-invalid @enderror" 
                               id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
                        @error('isbn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="published_year" class="form-label">Published Year <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('published_year') is-invalid @enderror" 
                               id="published_year" name="published_year" 
                               value="{{ old('published_year', $book->published_year) }}" 
                               min="1000" max="{{ date('Y') + 1 }}" required>
                        @error('published_year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4">{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Update Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
