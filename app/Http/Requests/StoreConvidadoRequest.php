<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 

class StoreConvidadoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('convidados')->where(function ($query) {
                    return $query->where('usuario_id', auth()->id());
                }),
            ],
            'celular' => [
                'required',
                'string',
                'max:15',
                Rule::unique('convidados')->where(function ($query) {
                    return $query->where('usuario_id', auth()->id());
                }),
            ],
        ];
    }
}
