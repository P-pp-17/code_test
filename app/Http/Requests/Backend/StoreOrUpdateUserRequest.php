<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateUserRequest extends FormRequest
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
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'image' => $imageRule,
            // 'address' => 'required|string',
            // 'address_phone' => 'required',
            // 'type'  => 'required',
            // 'lat'   =>  'required',
            // 'lng'   => 'required',
            // 'loc_name'  =>  'required|string'
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
            'email.required' => 'The email cannot be blank.',
            //'email.email' => 'The field must be email.',
            'image.required' => 'The photo cannot be blank.',
            // 'address.required'  =>  'The address cannot be blank.',
            // 'address.string'    =>  'The address must be string.',
            // 'address_phone.required' => 'The phone cannot be blank.',
            // 'address_phone.number' => 'The phone must be number.',
            // 'type.required' => 'Please select the address type.',
            // 'lat.required' => 'The latitude cannot be blank.',
            // 'lng.required' => 'The longitude cannot be blank',
            // 'loc_name' => 'The location name cannot be blank'
        ];
    }
}
