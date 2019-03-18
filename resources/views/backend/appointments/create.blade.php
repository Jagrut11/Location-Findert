@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.appointments.management') . ' | ' . trans('labels.backend.appointments.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.appointments.management') }}
        <small>{{ trans('labels.backend.appointments.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.appointments.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-appointment']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.appointments.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.appointments.partials.appointments-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.appointments.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.appointments.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
