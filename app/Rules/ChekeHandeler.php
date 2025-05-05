<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ChekeHandeler implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if (! preg_match('/^@[a-zA-Z0-9_-]+$/', $value)) {
            $fail('precisa começar com @ e conter apenas letras - _ números e não pode conter espaços');
        }
        
    }
}
