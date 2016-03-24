@extends('app')
@section('content')
    <nav>
      <ul class="pager">
        <li class="previous"><a href="{{url('produtos')}}"><span aria-hidden="true">&larr;</span>voltar</a></li>
      </ul>
    </nav>
    <h3><span class="label label-default"> {{$titulo}} </span></h3>
    @if( isset($produto->id) )
        {!! Form::open(['route'=>['produtos.update', $produto->id]]) !!}
    @else
        {!! Form::open(['route'=>'produtos.store']) !!}
    @endif

    <!-- Nome Form Input -->

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('pro_nome', isset($produto->pro_nome) ? $produto->pro_nome:null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}   
  
@endsection

