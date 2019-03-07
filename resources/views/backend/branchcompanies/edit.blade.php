@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.branchcompanies.management') . ' | ' . trans('labels.backend.branchcompanies.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.branchcompanies.management') }}
        <small>{{ trans('labels.backend.branchcompanies.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($branchcompany, ['route' => ['admin.branchcompanies.update', $branchcompany], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-branchcompany']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.branchcompanies.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.branchcompanies.partials.branchcompanies-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.branchcompanies.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.branchcompanies.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
