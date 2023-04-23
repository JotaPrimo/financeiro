<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DebitoRequest extends FormRequest
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
            'nome' => [
                'required', 'min:5', 'max:190'
            ],
            'valor' => [
                'required', 'min:0.1', 'max:2000000000'
            ],
            'ano' => 'required',
            'mes_id' => ['required', 'exists:mes,id'],
            'categoria_debito_id' => ['required', 'exists:categoria_debitos,id'],
        ];
    }

    public function messages()
    {
        return [
            '*.requried' => 'Preencha este campo'
        ];
    }

}
