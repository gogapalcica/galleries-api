<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'required|min:2|max:255',
            'description'=>'required|max:1000',
            'url'=>['required', 'regex:~^(http(s?):)([/|.|\w|\s|-])*\.(?:jpe?g|png)$~'],
        ];
    }
}
