<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProventoRequest extends FormRequest
{
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
            'categoria_provento_id' => ['required', 'exists:categoria_proventos,id'],
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Preencha este campo'
        ];
    }
}
