<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtendimentoRequest extends FormRequest
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
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'date' => 'O campo deve ser no formato de data',
            'max' => 'O campo deve ter no máximo :max caracteres',
            'required' => 'O preenchimento do campo é obrigatório',
        ];
    }
}
