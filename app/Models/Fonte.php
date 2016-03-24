<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fonte extends Model
{
    protected $fillable = ['id','codigo','descricao', 'valor'];
}
