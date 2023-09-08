<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'name'   => 'required|unique:groups|max:50',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
		return [
            'name.required'   => 'Informe o nome.',
            'name.unique'     => 'Este grupo já está cadastrado.',
            'name.max'        => 'Atingiu número máximo de caracteres.(Max. 50)',
		];
	}
}
