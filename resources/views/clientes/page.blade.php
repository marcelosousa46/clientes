@extends('app')

@section('content')
    <table class="table table-striped table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Ação</th>
            </tr>
        </thead>
        <div class="container">
            @foreach ($clientes as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->cli_nome }}</td>
                    <td>{{ $item->cli_endereco }}</td>
                    <td>
                        <a href="clientes/edit/'{{ $item->id }}"class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="clientes/destroy/'{{ $item->id }}" class="btn btn-xs btn-primary"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>    
            @endforeach
        </div>
    </table>
    <div class="container">
        {!! $clientes->render() !!} 
    </div>
    {!! Form::label('pesquisa', 'Pesquisa:') !!}
    {!! Form::text('edPesquisa', '') !!}
    {{ HTML::image('img/picture.jpg', 'a picture', array('class' => 'thumb')) }}
@endsection

@section('post-script')
    <script type="text/javascript">
        var template = Handlebars.compile($("#details-template").html());
        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'http://datatables.yajrabox.com/eloquent/master-data',
            columns: [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'}
            ],
            order: [[1, 'asc']]
        });

        // Add event listener for opening and closing details
        $('#users-table tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var tableId = 'posts-' + row.data().id;

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

        function initTable(tableId, data) {
            $('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' }
                ]
            })
        }   
    </script>
@endsection
