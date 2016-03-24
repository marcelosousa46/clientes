@extends('app')
@section('content')
    <nav>
      <ul class="pager">
        <li class="previous"><a href="{{url('associados')}}"><span aria-hidden="true">&larr;</span>voltar</a></li>
      </ul>
    </nav>
    <h3><span class="label label-default"> {{$titulo}} </span></h3>
    @if( isset($associado->id) )
        {!! Form::open(array('url' => 'associados/update'), [$associado->id]) !!}
    @else
        {!! Form::open(array('url' => 'associados/store')) !!}
    @endif

    <!-- Nome Form Input -->

        <div class="form-group">
            {!! Form::label('opcao', 'Qual tipo sera Cadastrado') !!}<br>
            {!! Form::label('opcao', 'Pessoa Fisica') !!}
            {!! Form::radio('pessoa', 'F') !!}
            {!! Form::label('opcao', 'Pessoa Juridica') !!}
            {!! Form::radio('pessoa', 'J') !!}<br>
        </div>
        
        <div class="form-group" id='campos_geral'>
            <div class="form-group" id='pessoa_fisica'>
                <div class="col-lg-3 col-md-6 col-sx-12">
                    {!! Form::label('cpf', 'CPF:') !!}
                    {!! Form::text('esa_cpf', isset($associado->esa_cpf) ? $associado->esa_cpf:null, ['class'=>'form-control']) !!}
                </div>
                <div class="col-lg-3 col-md-6 col-sx-12">
                    {!! Form::label('nome', 'Nome:') !!}
                    {!! Form::text('esa_nome', isset($associado->esa_nome) ? $associado->esa_nome:null, ['class'=>'form-control']) !!}<br>
                </div>
            </div>
            <div class="form-group" id='pessoa_juridica'>
                <div class="col-lg-3 col-md-6 col-sx-12">
                    {!! Form::label('cnpj', 'CNPJ:') !!}
                    {!! Form::text('esa_cnpj', isset($associado->esa_cnpj) ? $associado->esa_cnpj:null, ['class'=>'form-control']) !!}
                </div>
                <div class="col-lg-3 col-md-6 col-sx-12">
                    {!! Form::label('razao', 'Razão Social:') !!}
                    {!! Form::text('esa_razao_social', isset($associado->esa_razao_social) ? $associado->esa_razao_social:null, ['class'=>'form-control']) !!}<br>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sx-12">
                {!! Form::label('endereco', 'Endereço:') !!}
                {!! Form::text('esa_endereco', isset($associado->esa_endereco) ? $associado->esa_endereco:null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-lg-12">
                {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>    


    {!! Form::close() !!}   
  
@stop
@push('scripts')
<script>
    $(document).ready( function(){ 
        $("[name='pessoa']").change( function(){
            if($(this).val() === 'F'){
                $('#pessoa_juridica').fadeOut(400, function(){
                    $('#pessoa_fisica').fadeIn();
                });
            }
        });
        $("[name='pessoa']").change( function(){
            if($(this).val() === 'J'){
                $('#pessoa_fisica').fadeOut(400, function(){
                    $('#pessoa_juridica').fadeIn();
                });
            }
        });
    });
</script>
@endpush


