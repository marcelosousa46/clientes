<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Models\Escritorio_assoc;
use DB;

class Escritorio_assocController extends Controller
{
    public function getIndex() {
        return view('associados.associados');
    }
    public function getTeste() {
        return view('associados.teste');
    }
    
    public function anyData() {
        $dados = DB::table('escritorio_assoc')
                ->select(['id', 'esa_razao_social', 'esa_cnpj', 'esa_endereco'])
                ->where('esa_cnpj', '<>', '');
        return Datatables::of($dados)
        ->addColumn('action', function ($escritorio) {
        return [
                '<a href="associados/edit/'.$escritorio->id.'" class="glyphicon glyphicon-pencil" title="Editar"></a>',
                '<a href="associados/destroy/'.$escritorio->id.'" class="glyphicon glyphicon-trash" title="Deletar" 
                onclick="return confirm(\'Excluir escritorio associado?\')"></a>'
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
    public function anyDataf() {
        $dados = DB::table('escritorio_assoc')
                ->select(['id', 'esa_nome', 'esa_cpf', 'esa_endereco'])
                ->where('esa_cpf', '<>', '');
        return Datatables::of($dados)
        ->addColumn('action', function ($escritorio) {
        return [
                '<a href="associados/edit/'.$escritorio->id.'" class="glyphicon glyphicon-pencil" title="Editar"></a>',
                '<a href="associados/destroy/'.$escritorio->id.'" class="glyphicon glyphicon-trash" title="Deletar" 
                onclick="return confirm(\'Excluir escritorio associado?\')"></a>'
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
        $titulo = 'Cadastrar novo Edcritório Associado';
        return view('associados.associados-crud',compact('titulo'));
    }
    public function postStore(Request $request)
    {
        $input = $request->all();
        Escritorio_assoc::create($input);

        return redirect()->route('associados');

    }
    
}
