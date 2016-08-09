<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'username' => 'required|unique:users|regex:/^[A-Za-z0-9 \t]*$/i|max:100|min:3',
            'password' => 'required|min:6|max:100',
            'fullname'  => 'required|min:3|max:100|regex:/^[A-Za-z \t]*\p{L}+/i',
            'birthday' => 'required|date',
            'address' => 'required|regex:/^[.,\-\/A-Za-z0-9 \t]*\p{L}+/i|min:6|max:100',
            'expiretime' => 'required|date',
            'phone' => 'required|regex:/^[0-9]*$/i|max: 14|min:10',
            'image'     => 'mimes:jpeg,jpg,png|max:100'
        ];
    }
}
