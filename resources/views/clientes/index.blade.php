@extends('app')

@section('content')
    <table class="table table-bordered" id="clientes-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Ação</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#clientes-table').DataTable({
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
        ajax: '{!! route('clientes.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'cli_nome', name: 'cli_nome' },
            { data: 'cli_endereco', name: 'cli_endereco' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
// Add event listener for opening and closing details
    $('#clientes-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'contato-' + row.data().id;

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(template(row.data())).show();
            initTable(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }
    });    
});
</script>
@endpush