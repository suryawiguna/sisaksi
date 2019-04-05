<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUser extends FormRequest
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
        $rules = [
            'username'  => 'required|unique:users,username|min:8|max:20',
            'password'  => 'required|min:8',
            'role_id'   => 'required|integer|exists:roles,id'
        ];
        if($this->isMethod('PUT')) {
            $rules['username'] = 'sometimes|required|unique:users,username|min:8|max:20';
            $rules['password'] = 'sometimes|required|min:8';
            $rules['role_id'] = 'sometimes|required|integer|exists:roles,id';
        }
        return $rules;
    }
}
