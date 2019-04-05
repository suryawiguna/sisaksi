<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePengumuman extends FormRequest
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
            'judul'       => 'required|string|max:100',
            'isi'         => 'required|string|max:500',
            'lampiran'    => 'sometimes|required|file|mimes:jpeg,jpg,png,pdf|max:5000',
        ];
        return $rules;
    }
}
