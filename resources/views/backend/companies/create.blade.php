@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.companies.management') . ' | ' . trans('labels.backend.companies.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.companies.management') }}
        <small>{{ trans('labels.backend.companies.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.companies.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-company']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.companies.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.companies.partials.companies-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

           

                {{-- Company Name --}}
                <div class="form-group">
                    {{ Form::label('name', 'Company Name', ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('company_name', null, ['class' => 'form-control box-size', 'placeholder' => 'Enter Company Name', 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.companies.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.companies.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
