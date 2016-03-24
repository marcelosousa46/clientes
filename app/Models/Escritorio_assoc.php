<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escritorio_assoc extends Model
{
    protected $table    = 'escritorio_assoc';
    protected $fillable = ['id', 'esa_cpf', 'esa_cnpj', 'esa_razao_social',
                           'esa_nome', 'esa_endereco', 'esa_endereco_lat',
                           'esa_endereco_lon', 'esa_endereco_google', 'esa_cep'
                           ];
}
