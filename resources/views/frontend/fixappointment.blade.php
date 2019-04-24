@extends('frontend.layouts.app')

@section('content')


<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link rel=”stylesheet” href=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/locales.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css"></script>
    <div oncontextmenu="return false;"><div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                    <div class="panel-heading"><center><font size="3"><h1 align="center"><a  class="effect-box">Fix Appointment</a></h1></font></center></div>

                    <div class="panel-body">
                                            <form action="/search1" method="POST" role="search">
                                                {{ csrf_field() }}
                                                <div class="input-group">
                                                    <input type="text" class="typeahead form-control" name="q"
                                                        placeholder="Search users"> <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-default">
                                                            <span class="glyphicon glyphicon-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div><!--panel-body--> <!-- showing search form -->
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
                        <th>Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($details as $user)
                                                    <tr>
                                                        <td >{{$user->first_name}}</td>
                                                        <td>{{$user->last_name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                                  
                                                            <button style="color: dodgerblue; border: none;
                                                              background-color: inherit;
                                                              padding: 14px 15px;
                                                              font-size: 16px;
                                                              cursor: pointer;
                                                              display: inline-block;background: #eee;">
 <!--                <a href="{{action('SearchController@locate',$user->latitude)}}" onclick="showAlert" class="map-container">Locate <i class="fa fa-pencil-square-o"></i></a> --> 

<!--  <a href="/locate/{{$user->id}}"> <button  class="submitbtn map-container" style="vertical-align:middle" ><span>Details</span></button></a> -->
<a href="/locate/{{$user->id}}" onclick="showAlert" class="map-container">Details <i class="fa fa-pencil-square-o"></i></a>
<script type="text/javascript">
  function showAlert() {
    // body...
    Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
  }
</script>
                                                            </button>                                      
                                                            
</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                        </div> <!-- showing search result  -->



               <div class="panel-body">
        <center>
        <div>
          <form action="/fixappointmentform" method="get">
          <?php if(isset($user))
                {
          ?>
          <div class="form-group"  style="width: 340px; text-align: left;">
            {!! Form::label('name', 'Employee Name') !!}
            {!! Form::text('name',$user->first_name. ' '. $user-> last_name,['class' => 'form-control']) !!}
          </div>

          <div class="form-group" style="width: 340px; text-align: left;">
            {!! Form::label('email', 'E-mail Address') !!}<i style="margin-left: 3px;" class="fas fa-envelope-square"></i>
            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group" style="width: 340px; text-align: left;">
            {!! Form::label('appointment date', 'Date: ' ) !!}
            <input type="date" name="appointmentdate" id="start" value="2018-07-22" min="2019-01-01" max="2019-12-31" class = "form-control">
          </div>

          <div class="form-group" style="width: 340px; text-align: left;" >
            {!! Form::label('appointment time', 'Time: ' ) !!}
            <input type="time" name="appointmentime" id="start" value="19:00:00" class = "form-control">
          </div>

          <div class="form-group" style="width: 340px;">
<!-- {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
 -->        
 <button class="submitbtn" style="vertical-align:middle" type="submit"><span>Submit</span></button>

            <!-- <input type="submit" name="submit"  > -->
          <div class="form-group" style="width: 340px; text-align: left; visibility: hidden;">
            {!! Form::text('email', $user->id, ['class' => 'form-control']) !!}
            <input type="text" name="loggedinuser" id="start" value="{{ $logged_in_user->id }}" class = "form-control" placeholder="{{ $logged_in_user->id }}">
          </div>
          
          <?php }
                else
                {
          ?>
          <div class="form-group"  style="width: 340px; text-align: left;">
            {!! Form::label('name', 'Employee Name') !!}
            {!! Form::text('name','', ['class' => 'form-control']) !!}
          </div>

          <div class="form-group" style="width: 340px; text-align: left;">
            {!! Form::label('email', 'E-mail Address') !!}
            {!! Form::text('email', '', ['class' => 'form-control']) !!}
            
          </div>
          

          <div class="form-group" style="width: 340px; text-align: left;">
            {!! Form::label('appointment date', 'Date: ' ) !!}
            <input type="date" name="appointmentdate" id="start" value="2018-07-22" min="2019-01-01" max="2019-12-31" class = "form-control">
          </div>

          <div class="form-group" style="width: 340px; text-align: left;" >
            {!! Form::label('appointment time', 'Time: ' ) !!}
            <input type="time" name="appointmentime" id="start" value="19:00:00" class = "form-control">
          </div>

          <div class="form-group" style="width: 340px;">
<!-- {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
 -->        
          <div class="form-group">
<button class="submitbtn" style="vertical-align:middle" type="submit"><span>Submit</span></button>

              
          </div><!--form-group-->
             
          </div>
        <?php } ?>
          </form> 
        </div>
        </center>
        </div>
            </div>
        </div>

    </div>
    
    <div class="panel panel-default">
      <div class="panel-heading">
    <!-- footer
            =======================================-->
            <section class="footer2">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="well well-lg footer-box"> 
                                <strong><i class="fa fa-map-marker" aria-hidden="true"></i>Location Finder</strong>
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
                                    <li><span>Saturday and Sunday</span><span> Closed</span></li>
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
                            <p>Copyright 2019 Made by <a href="https://www.cygnet-infotech.com/" target="_blank">Cygnet Infotech</a>. All Rights Reserved.</p>
                        </div>
                    </div>  
                </div>
            </footer>

        
      </div>
        </div>
</div>
@endsection
<!-- https://map.what3words.com/daring.lion.race -->
