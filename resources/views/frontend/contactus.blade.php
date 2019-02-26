@extends('frontend.layouts.app')

@section('content')
<div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('Communicate with Us') }}</div>
                <div class="panel-body">
                	<img src="img/frontend/images.jpg" height="50%" width="100%">
                	<div style="position: absolute;  bottom: 88px;  right: 16px">
                		<img src="img/frontend/linkedin.png" height="60%" width="15%">
            		</div>
            		<div style="position: absolute;  bottom: 88px;  right: -100px">
                		<img src="img/frontend/google.png" height="60%" width="15%">
            		</div>
            		<div style="position: absolute;  bottom: 88px;  right: 35px">
                		<img src="img/frontend/email.png" height="5%" width="30%">
            		</div>
            		<div style="position: absolute;  bottom: 180px;  right: -264px">
                		<img src="img/frontend/email.png" height="40%" width="100%">
            		</div>
            </div>
        </div>
</div>
@endsection