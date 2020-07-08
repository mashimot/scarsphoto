<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class GalleryRequest extends FormRequest
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
        return [
            'gallery_name' => [
                "required", 
                "string", 
                Rule::unique('galleries_users', 'gallery_user_name')->ignore($this->route('gallery'), 'gallery_user_id')
            ],
        ];
    }
}
