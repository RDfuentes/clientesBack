<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'dpi',
    'nombre_completo',
    'fecha_nacimiento',
    'telefono',
    'direccion',
    'genero',
])]

class Cliente extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date:Y-m-d',
        ];
    }
}
