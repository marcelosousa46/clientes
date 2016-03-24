<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table    = 'clientes';
    protected $fillable = ['id','cli_nome','cli_endereco'];
    
    public function ContatoCliente() {
        return $this->hasMany('App\ContatoCliente');    
    }
}
