<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table    = 'produto';
    protected $fillable = ['id','pro_nome','pro_valor_min','pro_valor_max'];
}
