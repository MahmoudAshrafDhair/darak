<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WelcomePageRequest extends FormRequest
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
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title_ar.required' => __('general.required'),
            'title_en.required' => __('general.required'),
            'description_ar.required' => __('general.required'),
            'description_en.required' => __('general.required'),
            'image.required_without' => __('general.required'),
            'image.image' => __('general.image'),
            'image.mimes' => __('general.mimes'),
        ];
    }

}
