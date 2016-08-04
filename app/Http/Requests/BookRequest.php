<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookRequest extends Request
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
            'name'     => 'required|unique:books,name|regex:/^[A-Za-z0-9 \t]*$/i|max:100|min:2',
            'category_id' => 'required',
            'author'   => 'required|regex:/^[.,\-A-Za-z0-9 \t]*$/i|min:3',
            'publish_year' => 'required|regex:/^[0-9]*$/i|max:4',
            'number_of_page'  => 'required|numeric|min:1',
            'quantity' => 'required|min:1',
            'image'    => 'required|mimes:jpeg,jpg,png'
        ];
    }

    /**
     * Get the error messages for the password confirmation.
     *
     * @return array
     */
    public function messages()
    {
        return [
           //
        ];
    }
}
