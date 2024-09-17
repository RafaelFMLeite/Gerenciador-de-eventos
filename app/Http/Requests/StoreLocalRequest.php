<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidCep;

class StoreLocalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rua' =>[
                'required',
                'string',
                'max:75'
            ],
            'bairro' => [
                'required',
                'string',
                'max:75'
            ],

            'cep' => [
                'required',
                'regex:/^\d{5}-\d{3}$/', new ValidCep,
            ],
            ];
    }
}
