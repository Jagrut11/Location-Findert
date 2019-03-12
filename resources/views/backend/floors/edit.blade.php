@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.floors.management') . ' | ' . trans('labels.backend.floors.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.floors.management') }}
        <small>{{ trans('labels.backend.floors.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($floors, ['route' => ['admin.floors.update', $floors], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-floor']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.floors.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.floors.partials.floors-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->
                        <div class="box-body">
                {{-- Branch Name --}}
                <div class="form-group">
                    {{ Form::label('name','floor_no', ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('floor_no', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.firstName'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.floors.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.floors.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
