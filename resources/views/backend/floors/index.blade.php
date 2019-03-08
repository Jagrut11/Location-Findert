@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.floors.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.floors.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.floors.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.floors.partials.floors-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="floors-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.floors.table.id') }}</th>
                            
                            <th>{{ trans('labels.backend.floors.table.floor_no') }}</th>
                            <th>{{ trans('labels.backend.floors.table.branch_id') }}</th>
                            <th>{{ trans('labels.backend.floors.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            var dataTable = $('#floors-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.floors.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.floors.table')}}.id'},
<<<<<<< HEAD
                    {data: 'created_at', name: '{{config('module.floors.table')}}.created_at'},
                    {data: 'floor_id', name: '{{config('module.floors.table')}}.floor_id'},
                    {data: 'floor_no', name: '{{config('module.floors.table')}}.floor_no'},
                    {data: 'branch_id', name: '{{config('module.floors.table')}}.branch_id'},
=======
                    {data: 'floor_no', name: '{{config('module.floors.table')}}.floor_no'},
                    {data: 'branch_id', name: '{{config('module.floors.table')}}.branch_id'},
                    {data: 'created_at', name: '{{config('module.floors.table')}}.created_at'},
>>>>>>> 2ce2f2887a01e65d251e7120a5e1e1270a72181d
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
