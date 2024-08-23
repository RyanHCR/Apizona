<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalidadeModel extends Model
{
    use HasFactory;
    protected $table = "localidades";

    protected $fillable = [
        'rua',
        'bairro',
        'numero',
        'cep',
        'cidade',
        'estado',
        'pais',
    ];
}
