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
            'name'     => 'required|unique:books,name',
            'category_id' => 'required',
            'author'   => 'required',
            'publish_year' => 'required',
            'number_of_page'  => 'required',
            'quantity' => 'required',
            'image'    => 'required'
        ];
    }

    /**
     * Get the error messages for the password confirmation.
     *
     * @return array
     */

}
