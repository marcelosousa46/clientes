@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-2">
            <a href="{{ URL::to('/associados/create') }}" class="btn btn-default">Novo escritorio associado</a>
        </div>    
    </div>    

    <table class="table table-bordered" id="associados-tableF">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Ação</th>
            </tr>
        </thead>
    </table>
    <table class="table table-bordered" id="associados-tableJ">
        <thead>
            <tr>
                <th>Razaão Social</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Ação</th>
            </tr>
        </thead>
    </table>

@stop

@push('scripts')
<script>
    $(function() {
        $('#associados-tableF').DataTable({
            language : {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            processing: true,
            serverSide: false,
            ajax: '{!! URL::to('/associados/dataf') !!}',
            columns: [
                { data: 'esa_nome', name: 'esa_razao_social' },
                { data: 'esa_cpf', name: 'esa_cnpj' },
                { data: 'esa_endereco', name: 'esa_endereco' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        
        $('#associados-tableJ').DataTable({
            language : {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            processing: true,
            serverSide: false,
            ajax: '{!! URL::to('/associados/data') !!}',
            columns: [
                { data: 'esa_razao_social', name: 'esa_razao_social' },
                { data: 'esa_cnpj', name: 'esa_cnpj' },
                { data: 'esa_endereco', name: 'esa_endereco' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

    });
</script>
@endpush