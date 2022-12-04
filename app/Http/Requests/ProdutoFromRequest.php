<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFromRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'categoria_id'=>[
                'required',
                'integer'
            ],
            'nome'=>[
                'required',
                'string'
            ],
            'pequena_discricao'=>[
                'required',
                'string'
            ],
            'discricao'=>[
                'required',
                'string'
            ],
            'localizacao'=>[
                'required',
                'string'
            ],
            'preco'=>[
                'required',
                'integer'
            ],
            'quartos'=>[
                'nullable',
                'integer'
            ],
            'numero'=>[
                'nullable',
                'integer'
            ],
            'casaBanho'=>[
                'nullable',
                'integer'
            ],
            'estado'=>[
                'nullable',
            ],
            'destaque'=>[
                'nullable',
            ],
            'imagem' =>[
                'nullable',
                
            ],
        ];
    }
}
