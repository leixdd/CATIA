<?php

namespace CATIA\Http\Requests;

use CATIA\Http\Requests\Request;

class PostRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'thumb' => 'image|max:500000',
        ];
    }
}
