@extends('frontend.layouts.app')

@section('content')
<div class="row">

<div class="col-xs-12">

<div class="panel panel-default">

    <div class="panel panel-default">
    <div class="panel-heading">{{ trans('Communicate with Us') }}</div>

    <div class="panel-body">
    	<img src="img/frontend/images.jpg" height="50%" width="100%">
        <div style="position: absolute;  top: 84px;  right: -200px">
             <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>

    <div class="carousel-inner" role="listbox">
        <div class="item" style="justify-content: center;" >
            <div class="intro-content text-center">
                <h1>Welcome to Ranger</h1>
                <p style="justify-content: center;">Make the Request for appointment. If accepted by the Employee, fix a convenient date and time for the same & will get the Location.</p>
                <br><br><br>
                <!-- <a class="btn btn-default" href="#" role="button">Read More <i class="lnr lnr-chevron-right"></i></a>
                <a class="btn btn-primary scroll" href="#what-we-do" role="button">Get Started <i class="lnr lnr-chevron-down"></i></a> -->
            </div>
        </div>
        <div class="item active">
            <div class="intro-content text-center">
                <h1>We can help you</h1>
                <p style="justify-content: center;">The location finder helps you to locate an employee city, branch and floor of your choice from any of the countries we service.</p>
                <br><br><br>
                <!-- <a class="btn btn-default" href="#" role="button">Read More <i class="lnr lnr-chevron-right"></i></a>
                <a class="btn btn-primary scroll" href="#what-we-do" role="button">Get Started <i class="lnr lnr-chevron-down"></i></a> -->
            </div>
        </div>
        <div class="item">
            <div class="intro-content text-center">
                <h1>We can Guide you</h1>
                <p style="justify-content: center;">This Website shows current location of employee.Location Finder service uses the Geolocation API to determine the precise location.</p>
                <br><br><br>
                <!-- <a class="btn btn-default" href="#" role="button">Read More <i class="lnr lnr-chevron-right"></i></a>

                <a class="btn btn-primary scroll" href="#what-we-do" role="button">Get Started <i class="lnr lnr-chevron-down"></i></a> -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
        </div>
    	<div style="position: absolute;  bottom: 88px;  right: 16px">
    		<a href="https://www.linkedin.com/in/cygnet-hrd-21430655" target="_blank"><img src="img/frontend/linkedin.png" height="60%" width="15%" target="_blank"></a>
		</div>
		<div style="position: absolute;  bottom: 88px;  right: -100px">
            <a href="https://www.google.com/maps/dir/23.0278893,72.5047998/cygnet+infotech/@23.0368837,72.5002279,13z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x395e84f34ea1ad61:0x9b75277b4cb25924!2m2!1d72.5646219!2d23.038482" target="_blank">
    		<img src="img/frontend/google.png" height="60%" width="15%" ></a>
		</div>
		<div style="position: absolute;  bottom: 88px;  right: 35px">
    		<a href="https://mail.google.com/mail/u/1/#drafts?compose=CllgCKCDCjdCBpSJXGzFfxQmZSbjQtTqJHtvTCwglBWPnvdFljwfwkXHMxPLtvvMxSSQwPrtjVq" target="_blank">
            <img src="img/frontend/email.png" height="5%" width="30%" ></a>
		</div>

		<!-- <div style="position: absolute;  bottom: 180px;  right: -264px">
    		<img src="img/frontend/email.png" height="40%" width="100%">
		</div> -->
    </div>
</div>

</div>
@endsection