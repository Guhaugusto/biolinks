<?php

namespace App\Http\Requests;

use App\Rules\ChekeHandeler;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\UploadedFile;



    /**
     * @property-read UploadedFile  $photo
     */

class ProfileRequest extends FormRequest
{

    
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
            'name' => ['required', 'MIN:3', 'MAX:30'],
            'description' => ['nullable'],
            'photo' => ['nullable', 'image'],
            'handler' => ['required', 
            Rule::unique('users')->ignoreModel($this->user()),

            new ChekeHandeler
        ],
        ];
        
    }
}
