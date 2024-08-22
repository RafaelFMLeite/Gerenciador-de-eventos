<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateConvidadoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => ['nullable', 'string', 'max:255'],
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('convidados')->where(function ($query) {
                    return $query->where('usuario_id', auth()->id());
                })->ignore($this->convidado->id),
            ],
            'celular' => [
                'nullable',
                'string',
                'max:15',
                Rule::unique('convidados')->where(function ($query) {
                    return $query->where('usuario_id', auth()->id());
                })->ignore($this->convidado->id),
            ],
        ];
    }
}
