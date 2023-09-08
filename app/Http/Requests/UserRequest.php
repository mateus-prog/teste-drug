<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'level' => 'required'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
		return [
            'name.required'     => 'Informe o nome.',
            'name.unique'       => 'Este usuario já está cadastrado.',
            'email.required'    => 'Informe o email.',
            'email.unique'      => 'Este email já está cadastrado.',
            'password.required' => 'Informe a senha.',
            'password.min'      => 'Informe uma senha com no minimo de caracteres(min. 6).',
            'level.required'    => 'Informe o tipo de login',
		];
	}
}
