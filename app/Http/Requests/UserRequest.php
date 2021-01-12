<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>'required',
            'surname'=>'required',
            'nickname'=>'required|unique:users',
            'phone'=>'required|unique:users',
            'sex'=>'required',
            'showPhone'=>'required',
            'avatar'=>'nullable|mimes:jpeg,jpg,bmp,png|max:1000',
        ];
    }

    public function authorize()
    {
        return false;
    }
}
