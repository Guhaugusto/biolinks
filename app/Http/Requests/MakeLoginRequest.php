<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;
use Illuminate\Foundation\Http\FormRequest;


/**
 * Handle  Login Request
 * @property-read string $email
 * @property-read string $password
 */

class MakeLoginRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }


    /**
     * Attemp to login in the system
     *  
     * @return bollean 
     */

    public function attempt(): bool
    {
        $credentials = $this->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $this->session()->regenerate();
            return true;
        }

        return false;
    }
}
