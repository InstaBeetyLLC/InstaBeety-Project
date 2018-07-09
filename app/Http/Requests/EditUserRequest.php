<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name'=>'required',
            'role_id'=>'required',
            'nationality_id'=>'required',
            'section'=>'alpha',
            'day_off'=>'alpha',
            'Job_title'=>'alpha',
            'email'=>'required|email'
        ];
    }
}
