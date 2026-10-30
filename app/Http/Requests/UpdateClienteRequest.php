<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'dpi' => [
                'sometimes',
                'required',
                'string',
                'max:20',
                Rule::unique('clientes', 'dpi')->ignore($this->route('cliente')),
            ],
            'nombre_completo' => ['sometimes', 'required', 'string', 'max:255'],
            'fecha_nacimiento' => ['sometimes', 'required', 'date', 'before:today'],
            'telefono' => ['sometimes', 'required', 'string', 'max:20'],
            'direccion' => ['sometimes', 'required', 'string', 'max:255'],
            'genero' => ['sometimes', 'required', 'string', Rule::in(['Masculino', 'Femenino', 'Otro'])],
        ];
    }
}
