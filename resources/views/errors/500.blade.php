@extends('app')
@section('content')
    <nav>
      <ul class="pager">
        <li class="previous"><a href="{{url('/')}}"><span aria-hidden="true">&larr;</span>voltar</a></li>
      </ul>
    </nav>
    <div class="alert alert-danger" role="alert">Error personalizado!!!</div>  
@endsection
