<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateVendorRequest extends FormRequest
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
        $imageRule = 'required';
        if ($this->method() == 'PUT') {
            $imageRule = 'nullable';
        }

        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string',
            'image' => $imageRule,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name cannot be blank.',
            'name.string' => 'The name must be characters.',
            'name.max' => 'The name is more than allowed characters.',
            'phone.required' => 'The phone cannot be blank.',
            'phone.numeric' => 'The phone must be numbeer.',
            'image.required' => 'The photo cannot be blank.',
            'address.required'  =>  'The address cannot be blank.',
            'address.string'    =>  'The address must be string.',
        ];
    }
}
