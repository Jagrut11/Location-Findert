@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.branches.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.branches.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.branches.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.branches.partials.branches-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="branches-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.branches.table.id') }}</th>
                            <th>{{ trans('labels.backend.branches.table.branch_name') }}</th>
                            <th>{{ trans('labels.backend.companies.table.company_id') }}</th>
                            <th>{{ trans('labels.backend.branches.table.createdat') }}</th>
                            
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
            var dataTable = $('#branches-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.branches.get") }}',
                    type: 'post'

                },
                columns: [
                    {data: 'id', name: '{{config('module.branches.table')}}.id'},
                    {data: 'branch_name', name: '{{config('module.branches.table')}}.branch_name'},
                    {data: 'company_id', name: '{{config('module.companies.table')}}.company_name'},
                    {data: 'created_at', name: '{{config('module.branches.table')}}.created_at'},
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
