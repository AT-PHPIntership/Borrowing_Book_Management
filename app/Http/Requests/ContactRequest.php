<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'yourname' => 'required|max:50',
            'email' => 'required|email|max:100',
            'company' => 'max:50',
            'subject' => 'required|max:100',
            'message' => 'required|max:5000',
        ];
    }
}
