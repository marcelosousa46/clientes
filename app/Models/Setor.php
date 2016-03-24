<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table    = 'setor';
    protected $fillable = ['id','set_nome','coordenador_setor_fun_id'];
}
