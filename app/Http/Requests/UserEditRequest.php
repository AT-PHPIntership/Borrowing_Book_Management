<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEditRequest extends Request
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
            'phone'     => 'required|max: 11',
            'address'   => 'required|max: 100',
            'birthday'  => 'required|date',
            'expiretime'=> 'required|date',
            'image'     => 'mimes:jpeg,jpg,png|max:100',
        ];
    }
}
