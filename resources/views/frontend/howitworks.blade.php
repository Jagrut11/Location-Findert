@extends('frontend.layouts.app')

@section('content')
<div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading" ><center><font face="Raleway,sans-serif"><h1>{{ trans('Working Of Location Finder') }}</h1></font></center></div>
                <div class="panel-body">
                  
                	<div style="height: 28%; border-radius: 25px; border: 2px solid #92a8d1; box-shadow: 10px 11px 18px #c0ded9;" >

                		<div ><br>
                			<font face="Raleway,sans-serif">
                				<h1 style="padding-left: 2%;"><b><center>Find Location</center> </b></h1>
                				<img src="img/frontend/meeting1.png" alt="1234" style="height:50%; width: 18%; padding-left: 2%;">
                			<font size="4">User can <b>search for employee</b> location for <b>booking an appointment</b> with a particular employee.</font>
                			</font>
                		</div><br>
                	</div><br>


                	<div style=" height: 28%; border-radius: 25px; border: 2px solid #92a8d1; box-shadow: 10px 11px 18px #c0ded9; " >

                		<div><br>
                			<font face="Raleway,sans-serif">
                				<h1 style="padding-left: 2%;"><b><center>Request For Meeting</center></b></h1>
                				<img src="img/frontend/meeting.png" alt="1234" style="height:50%; width: 18%; padding-left: 2%;">
                			<font size="4">User <b>request for meeting</b> with employee and <b>will be notified</b> If meeting confirmed by particular employee.</font>
                			</font>
                		</div><br>
                	</div><br>


                	

           		</div>
           		</div>
           	</div>
        </div>
</div>
@endsection