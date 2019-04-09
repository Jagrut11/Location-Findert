@extends('frontend.layouts.app')

@section('content')
<div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('Communicate with Us') }}</div>
                <div class="panel-body">
                	<img src="img/frontend/images.jpg" height="50%" width="100%">
                	<div style="position: absolute;  bottom: 88px;  right: 16px">
                		<a href="https://www.linkedin.com/in/cygnet-hrd-21430655"><img src="img/frontend/linkedin.png" height="60%" width="15%"></a>
            		</div>
            		<div style="position: absolute;  bottom: 88px;  right: -100px">
                        <a href="https://www.google.com/maps/dir/23.0278893,72.5047998/cygnet+infotech/@23.0368837,72.5002279,13z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x395e84f34ea1ad61:0x9b75277b4cb25924!2m2!1d72.5646219!2d23.038482">
                		<img src="img/frontend/google.png" height="60%" width="15%"></a>
            		</div>
            		<div style="position: absolute;  bottom: 88px;  right: 35px">
                		<a href="https://mail.google.com/mail/u/1/#drafts?compose=CllgCKCDCjdCBpSJXGzFfxQmZSbjQtTqJHtvTCwglBWPnvdFljwfwkXHMxPLtvvMxSSQwPrtjVq">
                        <img src="img/frontend/email.png" height="5%" width="30%"></a>
            		</div>
            		<!-- <div style="position: absolute;  bottom: 180px;  right: -264px">
                		<img src="img/frontend/email.png" height="40%" width="100%">
            		</div> -->
            </div>
        </div>
</div>
@endsection