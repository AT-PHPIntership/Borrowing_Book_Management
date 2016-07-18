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
            'name'     => 'require|unique:books,name',
            'category' => 'require',
            'author'   => 'require',
            'publishyear' => 'require',
            'numberpage'  => 'require',
            'quantity' => 'require',
            'image'    => 'require'
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
            'name.require' => trans('book_manage_lang.require'),
            'name.unique' => trans('book_manage_lang.unique'),
            'category.require' => trans('book_manage_lang.require'),
            'author.require' => trans('book_manage_lang.require'),
            'publishyear.require' => trans('book_manage_lang.require'),
            'numberpage.require'  => trans('book_manage_lang.require'),
            'quantity.require' => trans('book_manage_lang.require'),
            'image.require'  => trans('book_manage_lang.require')
        ];
    }
}
