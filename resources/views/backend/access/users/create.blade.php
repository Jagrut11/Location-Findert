@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.create') }}</small>
    </h1>
@endsection

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    {{ Form::open(['route' => 'admin.access.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.user-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                {{-- First Name --}}
                <div class="form-group">
                    {{ Form::label('First Name', trans('validation.attributes.backend.access.users.firstName'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('first_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.firstName'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Last Name --}}
                <div class="form-group">
                    {{ Form::label('Last Name', trans('validation.attributes.backend.access.users.lastName'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('last_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.lastName'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Email --}}
                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.email'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Password --}}
                <div class="form-group">
                    {{ Form::label('password', trans('validation.attributes.backend.access.users.password'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::password('password', ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.password'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Password Confirmation --}}
                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('validation.attributes.backend.access.users.password_confirmation'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::password('password_confirmation', ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.password_confirmation'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Latitude --}}
                <?php 

       $lat = session()->get('lat');  
        ?>&nbsp;
        <?php
        $lng = session()->get('lng');    
        ?> 

                <div class="form-group" >
                    {{ Form::label('name', 'Latitude', ['class' => 'col-lg-2 control-label required']) }}

         
    
                    <div class="col-lg-10">
                        {{ Form::text("Latitude","$lat", ['class' => 'form-control box-size', 'placeholder' => 'Latitude', 'required' => 'required']) }}
                         
                        

                    </div><!--col-lg-10-->
                </div><!--form control-->
                

                {{-- Longitude --}}

                <div class="form-group" >
                    {{ Form::label('name', 'Longitude', ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text("Longitude","$lng", ['class' => 'form-control box-size', 'placeholder' => 'Longitude', 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


                {{-- Branch Name --}}
                <div class="form-group">
                    {{ Form::label('name', 'Branch Name', ['class' => 'col-lg-2 control-label required']) }} 

                    <div class="col-lg-10">

                    <select class="form-control" id="Branch" name="branch_id">
                    <option value="">Branch Name </option> 
                    @foreach ($branch as $key=>$value)
                        <option value="{{$value->id }}">
                            {{ $value->branch_name }}
                        </option>
                        @endforeach 
                </select>
                    </div><!--col-lg-10-->
                </div><!--form control-->

                   {{-- Floor No --}}
                <div class="form-group">
                    {{ Form::label('name', 'Floor No', ['class' => 'col-lg-2 control-label required']) }} 


                    <div class="col-lg-10">

                <select class="form-control" id="Floor" name="floor_id">
                    <option value=""> Floor No </option> 
                    @foreach ($floor as $key=>$value)
                        <option value="<?php echo $value->id ?>">
                            {{ $value->floor_no }}
                        </option>
                        @endforeach 
                </select>
                    </div><!--col-lg-10-->
                </div><!--form control-->


                    {{-- Seat No --}}
                <div class="form-group">
                    {{ Form::label('name', 'Seat No', ['class' => 'col-lg-2 control-label required']) }} 


                    <div class="col-lg-10">

                <select class="form-control" id="Seat" name="seat_id">
                    <option value=""> Seat No </option> 
                    @foreach ($seats as $key=>$value)
                        <option value="<?php echo $value->id ?>">
                            {{ $value->seat_no }}
                        </option>
                        @endforeach 
                </select>
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Status --}}
                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                                <div class="control-group">
                                    <label class="control control--checkbox">
                                        {{ Form::checkbox('status', '1', true) }}
                                    <div class="control__indicator"></div>
                                    </label>
                                </div>
                    </div><!--col-lg-1-->
                </div><!--form control-->

                {{-- Confirmed --}}
                <div class="form-group">
                    {{ Form::label('confirmed', trans('validation.attributes.backend.access.users.confirmed'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                         <div class="control-group">
                            <label class="control control--checkbox">
                                {{ Form::checkbox('confirmed', '1', true) }}
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div><!--col-lg-1-->
                </div><!--form control-->

                {{-- Confirmation Email --}}
                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.users.send_confirmation_email') }}<br/>
                        <small>{{ trans('strings.backend.access.users.if_confirmed_off') }}</small>
                    </label>

                    <div class="col-lg-1">
                        <div class="control-group">
                            <label class="control control--checkbox">
                                {{ Form::checkbox('confirmation_email', '1') }}
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div><!--col-lg-1-->
                </div><!--form control-->

                {{-- Associated Roles --}}
                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-8">
                        @if (count($roles) > 0)
                            @foreach($roles as $role)
                                <div>
                                <label for="role-{{$role->id}}" class="control control--radio">
                                <input type="radio" value="{{$role->id}}" name="assignees_roles[]" id="role-{{$role->id}}" class="get-role-for-permissions" {{ $role->id == 3 ? 'checked' : '' }} />  &nbsp;&nbsp;{!! $role->name !!}
                                <div class="control__indicator"></div>
                                    <a href="#" data-role="role_{{ $role->id }}" class="show-permissions small">
                                        (
                                            <span class="show-text">{{ trans('labels.general.show') }}</span>
                                            <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                            {{ trans('labels.backend.access.users.permissions') }}
                                        )
                                    </a>
                                </label>
                                </div>
                                <div class="permission-list hidden" data-role="role_{{ $role->id }}">
                                    @if ($role->all)
                                        {{ trans('labels.backend.access.users.all_permissions') }}<br/><br/>
                                    @else
                                        @if (count($role->permissions) > 0)
                                            <blockquote class="small">{{--
                                        --}}@foreach ($role->permissions as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                                @endforeach
                                            </blockquote>
                                        @else
                                            {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                                        @endif
                                    @endif
                                </div><!--permission list-->
                            @endforeach
                        @else
                            {{ trans('labels.backend.access.users.no_roles') }}
                        @endif
                    </div><!--col-lg-3-->
                </div><!--form control-->

                {{-- Associated Permissions --}}
                <div class="form-group">
                    {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                        <div id="available-permissions" class="hidden mt-20" style="width: 700px; height: 200px; overflow-x: hidden; overflow-y: scroll;">
                            <div class="row">
                                <div class="col-xs-12 get-available-permissions">

                                </div><!--col-lg-6-->
                            </div><!--row-->
                        </div><!--available permissions-->
                    </div><!--col-lg-3-->
                </div><!--form control-->

                {{-- Buttons --}}
                <div class="edit-form-btn">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
                </div>
            </div><!-- /.box-body -->
        </div><!--box-->
    {{ Form::close() }}
    <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Get Co-ordinates</h3>

                
            </div><!--box-header with-border-->
            <center>
            <form action="/getlatlong" style=" width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block;  border-radius: 4px; box-sizing: border-box;" >
            <input type="text" id="threewordaddress" name="threewordaddress" placeholder="Enter 3 Words Address Here" style="float: center; border: 3px solid #555; width: 20%;
  margin-top: 6px;border-radius: 4px;">
            
            <button type="submit" style="border-radius: 50%;" ><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            
        </form>
        <a href="https://map.what3words.com/rudder.knocking.nicer" target="_blank" style="background-color: #f44336; color: white; padding: 10px 34px; text-align: center; text-decoration: none; display: inline-block;">Select 3 word address here</a>

        </center>
        <br>
</div><!--col-lg-10-->
    
</div>
@endsection

@section('after-scripts')
   
    <script type="text/javascript">


        Backend.Utils.documentReady(function(){
            Backend.Users.selectors.getPremissionURL = "{{ route('admin.get.permission') }}";
            Backend.Users.init("create");
        });

        window.onload = function () {
            Backend.Users.windowloadhandler();
        };
        
    </script>
@endsection
