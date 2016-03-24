@extends('app')
@section('content')
    <nav>
      <ul class="pager">
        <li class="previous"><a href="{{url('/')}}"><span aria-hidden="true">&larr;</span>voltar</a></li>
      </ul>
    </nav>
    <h3><span class="label label-default"> Importar dados </span></h3>
        @if( isset($erro) )
            <div class="alert alert-danger" role="alert">{{ $erro }}</div>  
        @endif
        @if( isset($contador) )
            <div class="alert alert-success" role="alert">{{ $contador }} Registros adicionados!</div>  
        @endif
        {!! Form::open(array('url' => 'fontes/update', 'enctype' => 'multipart/form-data', 'method' => 'post'))  !!}
        <div class="form-group">
            {!! Form::label('n1', 'Arquivo CSV:') !!}
            {!! Form::file('arquivo', $attributes = array()) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close() !!}   
  
@endsection
