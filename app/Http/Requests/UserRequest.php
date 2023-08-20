<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'required_without:id|image|mimes:jpg,png,jpeg,gif,svg',
            'username' => 'required',
            'full_name' => 'required',
            'password' => 'required_without:id',
            'phone' =>'required|unique:users,phone,' . $this->id,
            'email' => 'required|email|unique:users,email,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'image.required_without' => __('general.required'),
            'image.image' => __('general.image_v'),
            'image.mimes' => __('general.mimes'),
            'username.required' => __('general.required'),
            'full_name.required' => __('general.required'),
            'password.required_without' => __('general.required'),
            'phone.required' => __('general.required'),
            'phone.unique' => __('general.unique'),
            'email.unique' => __('general.unique'),
            'email.required' => __('general.required'),
            'email.email' => __('general.email'),
        ];
    }
}
