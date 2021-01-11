<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required|min:15',
            'body' => 'required',
            'price' => 'required',
            'image.*' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo deve ser preenchido.',
            'min' => 'Campo deve ter no mínimo :min caracteres.',
            'image' => 'Arquivo não suportado.'
        ];
    }
}
