@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.branches.management') . ' | ' . trans('labels.backend.branches.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.branches.management') }}
        <small>{{ trans('labels.backend.branches.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.branches.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-branche']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.branches.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.branches.partials.branches-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">

                
              
                {{-- Branch Name --}}

                <div class="form-group">
                    {{ Form::label('name', 'Branch Name', ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('branch_name', null, ['class' => 'form-control box-size', 'placeholder' => 'Enter Branch Name', 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                 {{-- Company Name --}}
                <div class="form-group">
                    {{ Form::label('name', 'Company Name', ['class' => 'col-lg-2 control-label required']) }} 


                    <div class="col-lg-10">

                <select class="form-control" id="Company" name="company_id">
                    <option value=""> Select </option> 
                    @foreach ($data as $key=>$value)
                        <option value="<?php echo $value->id ?>">
                            {{ $value->company_name }}
                        </option>
                        @endforeach 
                </select>
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
