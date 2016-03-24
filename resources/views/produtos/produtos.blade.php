@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-2">
            <a href="{{ URL::to('/produtos/create') }}" class="btn btn-default">Novo produto</a>
        </div>    
    </div>    

    <table class="table table-bordered" id="produtos-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
    
$(function() {
    $('#produtos-table').DataTable({
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
        ajax: '{!! URL::to('/produtos/data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'pro_nome', name: 'pro_nome' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    
});

</script>
@endpush