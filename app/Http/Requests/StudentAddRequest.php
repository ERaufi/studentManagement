<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAddRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|min:1|max:100',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:m,f',
            'score' => 'required|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Write Student Name',
            'age.max' => 'Student can not be older than 100'
        ];
    }
}
