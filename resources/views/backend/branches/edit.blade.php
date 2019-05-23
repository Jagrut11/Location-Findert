@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.branches.management') . ' | ' . trans('labels.backend.branches.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.branches.management') }}
        <small>{{ trans('labels.backend.branches.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($branch, ['route' => ['admin.branches.update', $branch], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-branch']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.branches.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.branches.partials.branches-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

             {{-- Branch Name --}}
                <div class="form-group">
                    {{ Form::label('name','Branch Name', ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('branch_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.firstName'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                   

                 
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.branches.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.branches.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
