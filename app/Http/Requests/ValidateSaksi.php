<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSaksi extends FormRequest
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
            'koor'      => 'required|numeric|exists:koor,id',
            'partai'    => 'required|numeric|exists:partai,id',
            'notps'     => 'required|numeric',
            'nama'      => 'required|max:100|regex:/^[a-zA-Z., ]+$/',
            'gender'    => 'required|in:L,P',
            'alamat'    => 'required|max:100',
            'nohp'      => ['required', 'min:9', 'max:20', 'regex:/\+?([ -]?\d+)+|\(\d+\)([ -]\d+)/'],
            'fotoktp'   => 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
            'fotodiri'  => 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
        ];
        if($this->isMethod('PUT')) {
            $rules['koor']      = 'sometimes|required|numeric|exists:koor,id';
            $rules['partai']    = 'sometimes|required|numeric|exists:partai,id';
            $rules['notps']     = 'sometimes|required|numeric';
            $rules['fotoktp']   = 'sometimes|required|file|mimes:jpeg,jpg,bmp,png|max:5000';
            $rules['fotodiri']  = 'sometimes|required|file|mimes:jpeg,jpg,bmp,png|max:5000';
        }
        return $rules;
    }
}
