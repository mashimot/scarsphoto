<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
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
            //
            'contact_name' => 'required|max:255',
            'contact_email' => 'required|max:255|email',
            'contact_phone' => 'required|max:255',
            'contact_subject' => 'required|max:255',
            'contact_message' => 'required|max:500'
        ];
    }
}
