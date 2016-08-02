<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookEditRequest extends Request
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
            'name' => 'required|regex:/^[A-Za-z \t]*$/i|max:100',
            'category_id' => 'required',
            'author' => 'required|regex:/^[A-Za-z \t]*$/i|min:3',
            'image' => 'mimes:jpeg,jpg,png|max:100',
            'publish_year' => 'required|max:10|min:3',
            'number_of_page' => 'required|numeric|min:1',
        ];
    }
}
