<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|max:25',
        ];
    }

    public function messages()
    {
        return [
            //user data
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es valido',

            'password.required' => 'La contraseña es requerida',
            'password.max' => 'La contraseña debe tener menos de 25 caracteres',
        ];
    }
}
