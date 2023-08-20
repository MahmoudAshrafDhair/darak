<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required_without' => __('general.required'),
            'image.image' => __('general.image_v'),
            'image.mimes' => __('general.mimes'),
            'name.required' => __('general.required'),
        ];
    }
}
