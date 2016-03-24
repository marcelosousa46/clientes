<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContatoCliente extends Model
{
    protected $table    = 'contato_cliente';
    protected $fillable = ['id','cliente_cli_id','coc_nome','coc_email','coc_dt_nascimento',
                           'coc_num_matricula','coc_funcao','coc_setor','coc_recebe_email',
                           'coc_tel_fixo','coc_tel_cel','coc_tel_fax'];
    
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

}
