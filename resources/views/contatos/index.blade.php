@extends('app')
@section('content')
<div class="container">
    @foreach ($contatos as $contatos)
    <tr>
        <td>{{ $contatos->coc_nome }}</td>
    </tr>    
    @endforeach
</div>

{!! $contatos->render() !!}
@endsection