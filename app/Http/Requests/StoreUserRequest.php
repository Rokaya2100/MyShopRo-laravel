<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'fname'   => ['required', 'string', 'max:255'],
            'lname'   => ['required', 'string', 'max:255'],
            'email'   => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'   => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city'    => ['required', 'string', 'max:255'],
            'password'=> ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
