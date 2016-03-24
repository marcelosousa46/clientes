@extends('app')
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <title>Projeto Cliente</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="content">
            <div class="title">Bem vindo {!! Auth::user()->name !!} !!!</div>
        </div>
    </body>
</html>
@endsection
