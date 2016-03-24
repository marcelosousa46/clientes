<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use yajra\Datatables\Datatables;

class ClientesController extends Controller
{
    public function getIndex()
    {
        return view('clientes.index');
    }
    public function anyData()
    {
        return Datatables::of(Cliente::all())
                
        ->addColumn('action', function ($cliente) {
        return [
                '<a href="/edit/'.$cliente->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></a>',
                '<a href="/delete/'.$cliente->id.'" class="btn btn-xs btn-primary"><i class="fa fa-trash-o"></i></a>'
               ];
        })     
        ->setRowData([
                'id' => 'test',
        ])
        ->setRowAttr([
                'color' => 'red',
        ])
        
        ->make(true);
    }

}
