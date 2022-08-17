<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $passwordRule = 'required';
        if ($this->method() == 'PUT') {
            $passwordRule = 'nullable';
        }
        
        return [
            'role_id' => 'required|gt:0',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $this->route('admin') . ',id,deleted_at,NULL',
            'password' => $passwordRule . '|string|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'role_id.required' => 'Please select the role.',
            'role_id.gt' => 'Please select the role.',
            'name.required' => 'The name cannot be blank.',
            'name.max' => 'The name is more than allowed characters.',
            'email.required' => 'The email cannot be blank.',
            'email.max' => 'The email is more than allowed characters.',
            'email.unique' => 'The name has already taken.',
            'password.required' => 'The password cannot be blank.',
            'password.min' => 'The password must be minium :min characters.',
            'password.confirmed' => 'The confirm password does not match.'
        ];
    }
}
