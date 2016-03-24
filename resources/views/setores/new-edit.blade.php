@extends('app')
@section('content')
    <nav>
      <ul class="pager">
        <li class="previous"><a href="{{url('setores')}}"><span aria-hidden="true">&larr;</span>voltar</a></li>
      </ul>
    </nav>
    <h3><span class="label label-default"> {{$titulo}} </span></h3>
    @if( isset($setor->id) )
        {!! Form::open(['route'=>['setores.update', $setor->id]]) !!}
    @else
        {!! Form::open(['route'=>'setores.store']) !!}
    @endif

    <!-- Nome Form Input -->

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('set_nome', isset($setor->set_nome) ? $setor->set_nome:null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close() !!}   
  
@endsection

  