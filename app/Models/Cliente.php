<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table    = 'cliente';
    protected $fillable = ['id','cli_nome','cli_endereco'];

    public $timestamps = false;
    
    public function ContatoCliente() {
        return $this->hasMany('App\ContatoCliente');    
    }
}
