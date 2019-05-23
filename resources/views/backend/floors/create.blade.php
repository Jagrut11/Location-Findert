@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.floors.management') . ' | ' . trans('labels.backend.floors.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.floors.management') }}
        <small>{{ trans('labels.backend.floors.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.floors.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-floor']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.floors.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.floors.partials.floors-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
              
                {{-- floor number --}}
                <div class="form-group">
                    {{ Form::label('name', 'Floor No', ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('floor_no', null, ['class' => 'form-control box-size', 'placeholder' => 'Enter Floor No', 'required' => 'required']) }}  
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                {{-- Branch Name --}}
                <div class="form-group">
                    {{ Form::label('name', 'Branch Name', ['class' => 'col-lg-2 control-label required']) }}

                    
                    <div class="col-lg-2" >
                         <select class="form-control" id="Branch" name="branch_id" >
                    <option value=""> Select Branch Name</option> 
                    @foreach ($data as $key=>$value)
                        <option value="<?php echo $value->id ?>">
                            {{ $value->branch_name }}
                        </option>
                        @endforeach 
                </select>
                    </div><!--col-lg-10-->
                </div><!--form control-->

                
                    {{-- Including Form blade file --}}
                    @include("backend.floors.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.floors.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}

                        
                        <!-- <a href="/index1" target="_blank" style="background-color: #f44336; color: white; padding: 14px 25px; text-align: center; text-decoration: none; display: inline-block;">Add Layout</a> -->
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    
{{ Form::close() }}
                <!-- <form action="/updateJson" method="get"> -->
               <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add layout</h3>

               
            </div><!--box-header with-border-->
            <form action="/index1" method="get">
            <div class="col-lg-2" >
                         <select class="form-control" id="Branch" name="branch_id" >
                    <option value=""> Select Branch  </option> 
                    @foreach ($data as $key=>$value)
                        <option value="<?php echo $value->id ?>">
                            {{ $value->branch_name }}
                        </option>
                        @endforeach 
                </select>
            </div><!--col-lg-10-->

            <div class="col-lg-2" >
                         <select class="form-control" id="Floor" name="floor_id" >
                    <option value=""> Select Floor No </option> 
                    @foreach ($data1 as $key=>$value)
                        <option value="<?php echo $value->floor_no ?>">
                            {{ $value->floor_no }}
                        </option>
                        @endforeach 
                </select>
            </div><!--col-lg-10-->
            
            <button><input type="submit" ></button>   
            </form>    
</div>
<!-- </form> -->

@endsection
