<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Fonte;
use League\Csv\Reader;
use League\Csv\Writer;
use Input;
use Validator;


class FontesController extends Controller
{
    public function getIndex()
    {
        return view('fontes.index');
    }    
    public function anyCsv() {
        $fonte = Fonte::all();
        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $csv->setDelimiter(';');
        $csv->insertOne(\Schema::getColumnListing('Fonte'));
        foreach ($fonte as $result) {
            $csv->insertOne($result->toArray());
        }
        $csv->output('fontes.csv');
    }
    
    public function postUpdate(){
        $dados = Input::all();
        $rules = array('arquivo' => 'required');
        $validacao = Validator::make($dados, $rules);
        if ($validacao->fails())
        {   
            $erro = 'Favor escolher um arquivo!';
            return view('fontes.index',compact('erro'));
        }   
        $error = Input::file('arquivo')->getError();
        if ($error > 0)
        {
            $erro = 'Arquivo invalido!';
            return view('fontes.index',compact('erro'));
        }    
        $destino = $_SERVER['DOCUMENT_ROOT'].'\upload\\';
        $nome    = Input::file('arquivo')->getClientOriginalName();
        Input::file('arquivo')->move($destino, $nome);
        $keys = ['codigo', 'descricao', 'valor'];
        $reader = Reader::createFromPath($destino.$nome);
        $reader->setDelimiter(';');
        $contador = 0;
        foreach ($reader->fetchAssoc($keys) as $row) {
            $codigo = $row['codigo'];
            if (!$this->checaCodigo($codigo))
            {
                $erro = 'Arquivo invalido!';
                return view('fontes.index',compact('erro'));
            }    
            $fonte = Fonte::where('codigo', $codigo)->get();
            if (count($fonte) == 0){
               $fonte = new Fonte;
               $fonte->codigo    = $row['codigo'];
               $fonte->descricao = $row['descricao'];
               $fonte->valor     = str_replace(',', '.', $row['valor']);
               $fonte->save();
               $contador++;
            }
        }
        return view('fontes.index',compact('contador'));
    }
    function checaCodigo($codigo) {
        if (substr($codigo,5,1)=='.'){
            return true; 
        }
        return false; 
    }
}
