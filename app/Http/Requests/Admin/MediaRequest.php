<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
{
    private $all_ext = ['jpg', 'jpeg', 'png', 'gif'];

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
        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->all_ext);
        $rules = [];
        if($this->method() == 'POST'){
            $rules = [
                'medias' => 'required|array',
                'medias.*.media_title' => 'required',
                'medias.*.media_comment' => 'required|integer',
                'medias.*.media_nsfw' => 'required|numeric',            
                'medias.*.media_file' => "nullable|file|mimes:{$all_ext}|max:{$max_size}",
                'medias.*.media_galleries' => 'nullable|array',
                //'medias.*.media_galleries.*.m' => 'nullable|integer'
            ];
        }
        if($this->method() == 'PUT') {
            $rules = [
                'media_title' => 'required',
                'media_comment' => 'required|string',
                'media_nsfw' => 'required|numeric',            
                'media_file' => "nullable|file|mimes:{$all_ext}|max:{$max_size}",
                'media_galleries' => 'nullable|array',
                'media_galleries.*.gallery_id' => 'nullable|integer'
            ];
        }

        return $rules;
    }
        
}
