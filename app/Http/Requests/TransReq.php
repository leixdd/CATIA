<?php

namespace CATIA\Http\Requests;

use CATIA\Http\Requests\Request;

class TransReq extends Request
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
            'app_pay' => 'required'
        ];
    }
}
