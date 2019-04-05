<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateKoor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function response(array $errors){
        return \Redirect::back()->withErrors($errors)->withInput();
    }
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
            'kel'       => 'required|numeric|exists:kelurahan,id',
            'nama'      => 'required|max:100|regex:/^[a-zA-Z., ]+$/',
            'gender'    => 'required|in:L,P',
            'alamat'    => 'required|max:100',
            'nohp'      => ['required', 'min:9', 'max:20', 'regex:/\+?([ -]?\d+)+|\(\d+\)([ -]\d+)/'],
            'fotoktp'   => 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
            'fotodiri'  => 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
        ];
        if($this->isMethod('PUT')) {
            $rules['kel']       = 'sometimes|numeric|exists:kelurahan,id';
            $rules['fotoktp']   = 'sometimes|required|file|mimes:jpeg,jpg,bmp,png|max:5000';
            $rules['fotodiri']  = 'sometimes|required|file|mimes:jpeg,jpg,bmp,png|max:5000';
        }
        return $rules;
    }
}
