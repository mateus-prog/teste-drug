<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required|unique:clients',
            'cnpj' => 'required|unique:clients|max:14',
            'date_founding' => 'required',
            'group_id' => 'required'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
		return [
            'name.required'          => 'Informe o nome.',
            'name.unique'            => 'Este cliente já está cadastrado.',
            'cnpj.required'          => 'Informe o cnpj.',
            'cnpj.unique'            => 'Este cnpj já está cadastrado.',
            'date_founding.required' => 'Informe a data de fundação.',
            'group_id.required'      => 'Informe o grupo',
		];
	}
}
