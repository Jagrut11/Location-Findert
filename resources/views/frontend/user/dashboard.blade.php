@extends('frontend.layouts.app')
@section('page-header')
    <h1>
        {{ app_name() }}
        <small>Notifications</small>
    </h1>
@endsection

@section('content')
<!-- <video autoplay muted loop id="myVideo">
  <source src="C:\wamp64\www\Final LF\Location-Findert\public\img\frontend\bgvideo.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video> 
 -->    <div class="row" class="box-wrap">

        <div class="col-xs-12">

            <div class="panel panel-default">
 <div class="panel-heading"><h1 align="center"><a  class="effect-box">Home</a></h1></div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-push-8">

                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="img/frontend/profile-picture/pic-1.png" alt="profile-picture" style="height: 100px; width: 100px;">
                                    </div><!--media-left-->

                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{ $logged_in_user->name }}<br/>
                                            <small>
                                                {{ $logged_in_user->email }}<br/>
                                                Joined {{ $logged_in_user->created_at->format('F jS, Y') }}
                                            </small>
                                        </h4>

                                        {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}

                                        @permission('view-backend')
                                            {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                        @endauth
                                    </div><!--media-body-->
                                </li><!--media-->
                            </ul><!--media-list-->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a  href="fixappointment"><h4>Click Here To Fix Appointment <i class="fas fa-handshake"></i></h4></a>
                                </div><!--panel-heading-->

                                <div class="panel-body">
                                  <video src="img/frontend/homelocation.mp4" loop="" width="100%" autoplay></video>

                                </div><!--panel-body-->
                            </div><!--panel-->
     
                        </div><!--col-md-4-->

                        <div class="col-md-8 col-md-pull-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    
                                </div><!--col-xs-12-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default" class="box">
                                        <div class="panel-heading">
                                            <h4>Find Location <i class="fas fa-street-view"></i></h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            
                                            <div class="panel-body">
                                                <div class="container1">
                                                    <img src="img/frontend/location1.jpg" alt="Avatar" class="image" style="height: 250px; width: 250px;">
                                                    <div class="overlay">
                                                        <div class="text">
                                                            <p>The "Location Finder <i class="fas fa-map-marked-alt"></i>" Website shows your current geograph location of the employee, including latitude & longitude, on Maps. The geolocation service is available on both desktop computers and mobile phones. The location finder service uses the Maps Geolocation API to determine the exact place.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="panel panel-default" class="box">
                                        <div class="panel-heading">
                                            <h4>Fix Appointment <i class="fas fa-handshake"></i></h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <div class="panel-body">
                                                <div class="container1">
                                                    <img src="img/frontend/fix-Meeting.jpg" alt="Avatar" class="image" style="height: 250px; width: 250px;">
                                                    <div class="overlay">
                                                        <div class="text">
                                                            <p>The way you ask for the appointment could determine whether you'll make a sale. Be sure you get it right. You can request an appointment for a presentation. If the Employee agrees to meet you at their office, you can fix a convenient date and time for the same. </p>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->


                                <div class="col-md-12" >
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>
                                                <center>
                                                    <a href="/logs" name="notify" >Show Fixed Appointments <i class="fas fa-clipboard-list"></i></a>
                                                </center>
                                            </h4> 
                                        </div> <!--panel-heading-->
                                        <div class="panel-body">
                                        </div><!--panel-body-->

                                 @if(isset($appointment))   
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Receiver</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($appointment as $applogs)
                                            <tr>
                                                <td>{{$applogs->first_name}} {{$applogs->last_name}}</td>
                                                <td>{{$applogs->appointment_date}}</td>
                                                <td>{{$applogs->appointment_time}}</td>
                                                <td>{{$applogs->appointment_status}}</td>
                                                <?php 
                                                    if($applogs->appointment_status == 'Pending')
                                                    {
                                                        if($applogs->sender_id == $logged_in_user->id)
                                                        { }
                                                        else
                                                        {
                                                ?>
                                                
                                                <td>
                                                    <form action="/reject/{{$applogs->id}}" method="get">
                                                        <button type="submit" style="border-radius: 50%; background-color: coral;" >
                                                        <a onclick="alertreject()">
                                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                        </a>
                                                        </button>
                                                    </form> 
                                                    <br>
                                                    <form action="/accept/{{$applogs->id}}" method="get">
                                                        <button  type="submit" style="border-radius: 50%; background-color: lightgreen;" >
                                                        <a onclick="openForm()" onclick="alertaccept()">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        </a>
                                                        </button>
                                                        <div id="alert" style="padding: 20px; background-color: #4CAF50; /* Red */color: white;margin-bottom: 15px">
                                                            <span style="margin-left: 15px; color: white; font-weight: bold; float: right; font-size: 22px; line-height: 20px;  cursor: pointer; transition: 0.3s;" onclick="this.parentElement.style.display='none';">&times;</span> 
                                                            <p style="color: white;">This is an alert box.</p>
                                                        </div>
                                                    </form>
                                                    <script>
                                                        function openForm() 
                                                        {
                                                            document.getElementById("alert").style.display = "block";
                                                        }
                                                    </script>
                                                </td>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                                </div><!--panel-->

                
                            </div><!--row-->

                        </div><!--col-md-8-->

                    </div><!--row-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

        <div class="panel panel-default">
      <div class="panel-heading">
        

           <!-- footer
            =======================================-->
            <section class="footer2">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="well well-lg footer-box"> 
                                <strong><i class="fa fa-map-marker" aria-hidden="true"></i>
Location Finder</strong>
                                <p>The location finder helps you to locate an employee city,branch and floor of your choice from any of the countries we service.</p> 
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="well well-lg footer-box contact-box"> 
                                <strong>Contact Us</strong>
                                <p>Phone:  079 6712 4000</p>
                                <p>Email: support@gmail.com</p>
                                <p>Fax: (614) 395-7696</p>
                                <br>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="well well-lg footer-box service-box"> 
                                <strong>Services</strong>
                                <ul class="list-unstyled">
                                    <li>Find Location</li>
                                    <li>Search User</li>
                                    <li>Fix Appointment</li>
                                    <li>Identify Location</li>
                                </ul>
                                <br>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="well well-lg footer-box"> 
                                <strong>Working Hours</strong>
                                <ul class="list-unstyled schedule">
                                    <li><span>Open</span><span>9am - 10pm</span></li>
                                    <li><span>Saturday and Sunday</span><span>Closed</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="footer2 f-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-11 well well-lg footer-box">
                            <p>Copyright 2015 Made by <a href="https://www.cygnet-infotech.com/" target="_blank">Cygnet Infotech</a>. All Rights Reserved.</p>
                        </div>
                    </div>  
                </div>
            </footer>

        
      </div>
        </div>

    </div><!-- row -->
@endsection

