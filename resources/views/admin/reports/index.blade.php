@extends('adminlte::page')
@section('title','Clientes')
@section('content_header')
@stop
@section('content')
    <div class="card">
        @include('admin.partials.main_header',['action'=>'index','module_name'=>'reportes','route_add'=>null,'icon_class'=>'fas fa-hands-helping'])

        <div class="card-body">
            @include('admin.reports.partials.index',['collection'=>$reports,
                                                    'module'=>'reports',
                                                    'route_edit'=>'admin.reports.edit',
                                                    'route_delete'=>'admin.reports.destroy',
                                                    ])
        </div>
    </div>
@stop
@section('css')
    @include('includes.dataTable_css')
@stop
@section('js')

    @include('includes.sweatAlert_js')
    @include('includes.dataTable_js')
    <script>

        $(document).ready(function() {
            $('#reports_table').DataTable({
                dom: 'Bfrtip',
                language: {
                            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                        },
                buttons: [
                'excel', 'print'
            ]
            });




        } );

        $(document).on('submit', '.frm-delete', function(e) {

            e.preventDefault();
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Está acción no se puede revertir",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'No, cancelar',
                        confirmButtonText: 'si, continuar'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            /*
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )*/
                            this.submit();
                        }
                    });

        });

    </script>
@stop
