{{ Form::model($logged_in_user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

    <div class="form-group">
        {{ Form::label('first_name', trans('validation.attributes.frontend.register-user.firstName'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::input('text', 'first_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('last_name', trans('validation.attributes.frontend.register-user.lastName'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::input('text', 'last_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
        </div>
    </div>
    
                        <div class="form-group">
                            {{ Form::label('Designation', trans('Designation').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'designation', null, ['class' => 'form-control', 'placeholder' => trans('designation')]) }}
                    </div>
                </div>
                        <div class="form-group">
                            {{ Form::label('Contact', trans('Contact').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {{ Form::input('int', 'contact', null, ['class' => 'form-control', 'placeholder' => trans('Contact')]) }}
                        </div>
                </div>
                 <div class="form-group">
                    {{ Form::label('Department', trans('Department').'*', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::input('text', 'department', null, ['class' => 'form-control', 'placeholder' => trans('department')]) }}
                </div>
             </div>
    @if ($logged_in_user->canChangeEmail())
        <div class="form-group">
            {{ Form::label('email', trans('validation.attributes.frontend.register-user.email'), ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> {{  trans('strings.frontend.user.change_email_notice') }}
                </div>

                {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
            </div>
        </div>
    @endif
                    
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {{ Form::submit(trans('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
        </div>
    </div>

{{ Form::close() }}