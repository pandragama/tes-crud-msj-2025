<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:255', 'min:3'],
            'lastname' => ['required', 'string', 'max:255', 'min:3'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'address' => ['required', 'string', 'max:320', 'min:3'],
            'dob' => ['required'],
            'dept_id' => ['required', 'exists:departments,id'],
            'status' => ['required', Rule::in(['cont', 'emp', 'not_act'])],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'firstname.required' => 'First name is required.',
            'firstname.string' => 'First name must be a string.',
            'firstname.min' => 'First name must be at least 3 characters long.',
            'firstname.max' => 'First name must not exceed 255 characters.',
            'lastname.required' => 'Last name is required.',
            'lastname.string' => 'Last name must be a string.',
            'lastname.min' => 'Last name must be at least 3 characters long.',
            'lastname.max' => 'Last name must not exceed 255 characters.',
            'gender.required' => 'Gender is required.',
            'gender.in' => 'Gender must be either male or female.',
            'address.required' => 'Address is required.',
            'address.string' => 'Address must be a string.',
            'address.min' => 'Address must be at least 3 characters long.',
            'address.max' => 'Address must not exceed 320 characters.',
            'dob.required' => 'Date of birth is required.',
            'dept_id.required' => 'Department is required.',
            'dept_id.exists' => 'Department must be a valid department.',
            'status.required' => 'Status is required.',
            'status.in' => 'Status must be either Contact, Employee, or Not Active.',
        ];
    }
}