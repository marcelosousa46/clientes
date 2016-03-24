<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\ContatoCliente;
use DB;

class ContatoClientesController extends Controller
{
    public function index()
    {
        $contatos = DB::table('contato_cliente')->paginate(5);
        return view('contatos.index', ['contato_cliente' => $contatos]);
    }            
}
