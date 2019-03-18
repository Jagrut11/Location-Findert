@extends('frontend.layouts.app')

@section('content')
<!-- <video autoplay muted loop id="myVideo">
  <source src="C:\wamp64\www\Final LF\Location-Findert\public\img\frontend\bgvideo.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video> 
 -->    <div class="row" class="box-wrap">

        <div class="col-xs-12">

            <div class="panel panel-default">
 <div class="panel-heading">{{ trans('Home') }}</div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-push-8">

                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="{{ $logged_in_user->picture }}" alt="Profile picture">
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
                                    <h4>Notifications</h4>
                                </div><!--panel-heading-->

                                <div class="panel-body">
                                  <video src="img/frontend/homelocation.mp4" loop="" width="100%" autoplay></video>

                                </div><!--panel-body-->
                                <div class="panel-body">
                                  <a href=""> sdjgdsyfdbf</a>
                                </div><!--panel-body-->
                            </div><!--panel-->

                            
                        </div><!--col-md-4-->

                        <div class="col-md-8 col-md-pull-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel panel-default" class="box">
                                        <div class="panel-heading" class="heading-color" >
                                            <h4 >Search Employee</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <form action="/search" method="POST" role="search">
                                                {{ csrf_field() }}
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="q"
                                                        placeholder="Search users"> <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-default">
                                                            <span class="glyphicon glyphicon-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div><!--panel-body-->

                                        <div class="panel-body">
                                            @if(isset($details))
                                                <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                                            <h2>Searched User details</h2>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($details as $user)
                                                    <tr>
                                                        <td>{{$user->first_name}}</td>
                                                        <td>{{$user->last_name}}</td>
                                                        <td>{{$user->email}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                        </div> <!-- showing search result -->

                                    </div><!--panel-->
                                </div><!--col-xs-12-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default" class="box">
                                        <div class="panel-heading">
                                            <h4>Find Location</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>
                                                <center><img src="img/frontend/location1.jpg"></center ><br>
                                                Quick and easy to track down the location of employee.
                                            </p>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="panel panel-default" class="box">
                                        <div class="panel-heading">
                                            <a href="fixappointment"><h4>Fix Appointment</h4></a>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>
                                                <center>
                                                    <img style="height: 224px; width: 300px;" src="img/frontend/fix-Meeting.jpg">
                                                </center ><br>
                                                Quick and easy to fix the meeting with an employee <br>
                                            </p>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Item</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Item</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->

                            </div><!--row-->

                        </div><!--col-md-8-->

                    </div><!--row-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection