<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public function getIndex() {
        return view('produtos.produtos');
    }
    public function anyData() {
        return Datatables::of(produto::all())
        ->addColumn('action', function ($produtos) {
        return [
                '<a href="produtos/edit/'.$produtos->id.'" class="glyphicon glyphicon-pencil" title="Editar"></a>',
                '<a href="produtos/destroy/'.$produtos->id.'" class="glyphicon glyphicon-trash" title="Deletar" 
                onclick="return confirm(\'Excluir produto?\')"></a>'
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
        $titulo = 'Cadastrar novo produto';
        return view('produtos.produtos-crud',compact('titulo'));
    }
    
    
    public function postStore(Request $request)
    {
        $input = $request->all();
        Produto::create($input);

        return redirect()->route('produtos');

    }
    
    public function getDestroy($id)
    {
        Produto::find($id)->delete();

        return redirect()->route('produtos');
    }    
        
    public function getEdit($id)
    {
        $titulo  = 'Editar produto';
        $produto = Produto::find($id);
        return view('produtos.produtos-crud', compact('produto','titulo'));
    }
        

    public function postUpdate(Request $request, $id)
    {
        $produto = Produto::find($id)->update($request->all());

        return redirect()->route('produtos');
    }    
        
    
}
