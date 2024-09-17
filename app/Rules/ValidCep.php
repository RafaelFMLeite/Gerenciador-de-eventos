<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCep implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function passes($attribute, $value){
        $response = Http::get("https://viacep.com.br/ws/{$value}/json/");
        return $response->successful() && !isset($response->json()['erro']);
    }
    
    public function message(){
        return 'Cep inválido';
    }
}
