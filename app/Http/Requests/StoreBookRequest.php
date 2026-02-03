<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'required|string|unique:books,isbn',
            'published_year' => 'required|integer|min:1000|max:' . (date('Y') + 1),
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
