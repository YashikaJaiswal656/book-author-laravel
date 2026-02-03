<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $bookId = $this->route('book')->id;

        return [
            'title' => 'sometimes|required|string|max:255',
            'author_id' => 'sometimes|required|exists:authors,id',
            'isbn' => 'sometimes|required|string|unique:books,isbn,' . $bookId,
            'published_year' => 'sometimes|required|integer|min:1000|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Book title is required',
            'author_id.required' => 'Author is required',
            'author_id.exists' => 'Selected author does not exist',
            'isbn.required' => 'ISBN is required',
            'isbn.unique' => 'This ISBN is already registered',
            'published_year.required' => 'Publication year is required',
            'published_year.integer' => 'Publication year must be a number',
            'published_year.min' => 'Publication year seems invalid',
            'published_year.max' => 'Publication year cannot be in the future',
        ];
    }
}
