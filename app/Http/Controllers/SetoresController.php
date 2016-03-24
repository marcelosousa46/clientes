<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setor;
use yajra\Datatables\Datatables;
use Auth;
use Redirect;

class SetoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('terms', ['except' => ['anyData']]);  
    }
    public function getIndex()
    {
        return view('setores.setores');
    }    

    public function anyData()
    {
        return Datatables::of(Setor::all())
                
        ->addColumn('action', function ($setores) {
        return [
                '<a href="setores/edit/'.$setores->id.'" class="glyphicon glyphicon-pencil" title="Editar"></a>',
                '<a href="setores/destroy/'.$setores->id.'" class="glyphicon glyphicon-trash" title="Deletar" 
                onclick="return confirm(\'Excluir setor?\')"></a>'
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

    public function getCreate()
    {
        $titulo = 'Cadastrar novo setor';
        return view('setores.new-edit',compact('titulo'));
    }
    
    
    public function postStore(Request $request)
    {
        $input = $request->all();
        Setor::create($input);

        return redirect()->route('setores');

    }
    
    public function getDestroy($id)
    {
        Setor::find($id)->delete();

        return redirect()->route('setores');
    }    
        
    public function getEdit($id)
    {
        $titulo = 'Editaro setor';
        $setor = Setor::find($id);
        return view('setores.new-edit', compact('setor','titulo'));
    }
        

    public function postUpdate(Request $request, $id)
    {
        $setor = Setor::find($id)->update($request->all());

        return redirect()->route('setores');
    }    
        
    
    
}
