<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateProfileRequest extends Request
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
            'fullname'  => 'required|max:100',
            'phone'     => 'required|min:10|max: 11',
            'address'   => 'required|max: 100',
            'birthday'  => 'required|date',
            'image'     => 'mimes:jpeg,jpg,png|max:100'
        ];
    }
}
