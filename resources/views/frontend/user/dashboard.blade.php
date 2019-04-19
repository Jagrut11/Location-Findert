@extends('frontend.layouts.app')
@section('page-header')
    <h1>
        {{ app_name() }}
        <small>Notifications</small>
    </h1>
@endsection

@section('content')

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div oncontextmenu="return false;">
 <div class="row" class="box-wrap">

        <div class="col-xs-12">

            <div class="panel panel-default">
 <div class="panel-heading" style="height: 80px;"><h1 align="center"><a  class="effect-box">Location Finder</a></h1></div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-push-8">

                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="/img/frontend/profile-picture/pic-1.png" alt="profile-picture" style="height: 100px; width: 100px;">
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
                                  <video src="/img/frontend/homelocation.mp4" loop="" width="100%" autoplay></video>

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
                                                    <img src="/img/frontend/location1.jpg" alt="Avatar" class="image" style="height: 250px; width: 250px;">
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
                                                    <img src="/img/frontend/fix-Meeting.jpg" alt="Avatar" class="image" style="height: 250px; width: 250px;">
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
                                                <th>Sender</th>
                                                <th>Receiver</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($appointment as $applogs)
                                             @foreach($appointmentsender as $applogsender)
                                            <tr>
                                                <td>{{$applogsender->first_name}} {{$applogsender->last_name}}</td>
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
                                                    <div>
                                                    <form action="/reject/{{$applogs->id}}" method="get">
                                                        <button type="submit" class="reject" >
                                                        <a onclick="alertreject()">
                                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                        </a>
                                                        </button>
                                                    </form> 
                                                    </div>
                                                    <div style="float: left;">
                                                    <form action="accept/{{$applogs->id}}" method="get">
                                                        <button  type="submit" class="accept" >
                                                        <a onclick="alertaccept()">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        </a>
                                                        </button>
                                                    </form>
                                                </div>
                                                    <script>
                                                        function alertaccept() 
                                                        {
                                                            swal({
                                                                title:"Good Job!",
                                                                text: "Request Accepted.",
                                                                timer:4000,
                                                                showConfirmButton: false
                                                            })

                                                        }
                                                        function alertreject() 
                                                        {
                                                            swal({
                                                                title:"Oh!",
                                                                text: "Request Rejected.",
                                                                timer:4000,
                                                                showConfirmButton: false
                                                            })

                                                        }
                                                    </script>
                                                </td>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                            </tr>
                                            @endforeach
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


    
    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Location Finder</h5>
                    <ul>
                        <li>The location finder helps you to locate an employee, city , branch and floor of your choice from any of the counteries we service. </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Contact us</h5>
                    <ul>
                        <li>Phone: 079 6712 4000</li>
                        <li>Email: support@gmail.com</li>
                        <li>Fax: (614) 395-7696</li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Services</h5>
                    <ul>
                        <li>Find Location</li>
                        <li>Search User</li>
                        <li>Fix Appointment</li>
                        <li>Identify Location</li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Working Hours</h5>
                    <ul>
                        <li>Open 9am-10pm</a></li>
                        <li>5 Working Days</a></li>
                        <li>Holiday on weekend</a></li>
                    </ul>
                </div>
                
            </div>
            
        </div>
        <div class="social-networks">
            <a href="https://twitter.com/cygnetinfotech?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/IT.is.about.you/" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://mail.google.com/mail/u/1/#drafts?compose=CllgCKCDCjdCBpSJXGzFfxQmZSbjQtTqJHtvTCwglBWPnvdFljwfwkXHMxPLtvvMxSSQwPrtjVq" class="google" target="_blank"><i class="fa fa-google-plus"></i></a>
        </div>
        <div class="footer-copyright">
            <p>Copyright© 2019  Made by <a href="https://www.cygnet-infotech.com/" target="_blank"> Cygnet Infotech</a> .All Rights Reserved. </p>
        </div>
    </footer>

    
@endsection

