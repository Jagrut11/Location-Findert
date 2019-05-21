@extends('frontend.layouts.app')

@section('content')


<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

            
                                                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css"></script>
<div oncontextmenu="return false;">
  <div class="row box-wrap">
    <div class="col-xs-12">
      <div class="panel panel-default">
 
        <div class="panel-heading" style="height: 80px; background-color: #afd5e6;">
          <h1 align="center">
            <a  class="effect-box">Location Finder</a>
          </h1>
        </div>
      
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12">
              
              <div class="panel-body">
                <form action="/fixappointment/search1" method="POST" role="search">
                {{ csrf_field() }}

                <div class="input-group">

                  <input type="text" name="q" id="search_text"  class="form-control input-lg" placeholder="Search Employee">
                  <span class="input-group-btn">              
                    <button type="submit" class="btn btn-default">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>

                </div>
                </form>
                                                   
                <div id="nameList"></div>

              </div><!--panel-body--> 

              <!-- showing search form -->
              <div class="form-group">
                <div class="panel-body">
                  <?php if(isset($alert))
                    { ?>
                      {{ $alert }}
                  <?php 
                    } ?>
                
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
                          <a href="/fixappointment/search1/{{$user->id}}"></a> 
                          <a href="/locate/{{$user->id}}" onclick="showAlert">Details <i class="fa fa-pencil-square-o"></i></a>
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
                        {!! Form::label('email', 'E-mail Address') !!}
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
                        <button type="submit" class="button"><span>Submit </span></button>
                      </div>
                      
                      <div class="form-group" style="width: 340px; text-align: left; visibility: hidden;">
                        {!! Form::text('email', $user->id, ['class' => 'form-control']) !!}
                        <input type="text" name="loggedinuser" id="start" value="{{ $logged_in_user->id }}" class = "form-control" placeholder="{{ $logged_in_user->id }}">
                      </div>

                      <?php }
                            else
                            {
                            }
                      ?>
                    </form> 
                  </div>
                </center>
              </div>
            </div>
        </div>
    </div>

<script>
  $(document).ready(function(){
   $('#search_text').keyup(function(){ 
    var query = $(this).val();
    if(query != '')
    {
     var _token = $('input[name="_token"]').val();
     $.ajax({
      url:"{{ route('fixappointment.fetch') }}",
      method:"POST",
      data:{query:query, _token:_token},
      success:function(data){
       $('#nameList').fadeIn();  
       $('#nameList').html(data);
     }
   });
   }
 });
   $(document).on('click', 'li', function(){  
    $('#search_text').val($(this).text());  
    $('#nameList').fadeOut();  
  });  
 });
</script>

          </form>
        </div><!--panel-body--> <!-- showing search form -->
        
  </div>
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
            <p>CopyrightÂ© 2019  Made by <a href="https://www.cygnet-infotech.com/" target="_blank"> Cygnet Infotech</a> .All Rights Reserved. </p>
        </div>
    </footer>
@endsection
<!-- https://map.what3words.com/daring.lion.race -->


