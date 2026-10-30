<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClienteRequest extends FormRequest
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
            'dpi' => ['required', 'string', 'max:20', Rule::unique('clientes', 'dpi')],
            'nombre_completo' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date', 'before:today'],
            'telefono' => ['required', 'string', 'max:20'],
            'direccion' => ['required', 'string', 'max:255'],
            'genero' => ['required', 'string', Rule::in(['Masculino', 'Femenino', 'Otro'])],
        ];
    }
}
