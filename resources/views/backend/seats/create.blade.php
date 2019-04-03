@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.seats.management') . ' | ' . trans('labels.backend.seats.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.seats.management') }}
        <small>{{ trans('labels.backend.seats.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.seats.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-seat']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.seats.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.seats.partials.seats-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">

                 {{-- Seat No --}}
                <div class="form-group">
                    {{ Form::label('name', 'Seat No', ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('seat_no', null, ['class' => 'form-control box-size', 'placeholder' => 'Enter Seat No', 'required' => 'required']) }}  
                    </div><!--col-lg-10-->
                </div><!--form control-->

                 {{-- Floor No --}}
                <div class="form-group">
                    {{ Form::label('name', 'Floor No', ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                     <select class="form-control" id="Floor" name="floor_id">
                    <option value=""> Select </option> 
                    @foreach ($floor as $key=>$value)
                        <option value="<?php echo $value->id ?>">
                            {{ $value->floor_no }}
                        </option>
                        @endforeach 
                </select>   
                     </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.seats.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.seats.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
