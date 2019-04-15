@extends('frontend.layouts.app')

@section('content')


<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="row">

  <!--   <div class="col-xs-12"> -->

    <div class="panel panel-default">
      <div class="panel-heading"><center><font size="3">{{ trans('Fix Appointment') }}</font></center></div>

      <div class="panel-body">
        <form action="/fixappointment/search1" method="POST" role="search">
          {{ csrf_field() }}
          <div class="input-group">
                                                    <!-- <input type="text" class="typeahead form-control" name="q"
                                                      placeholder="Search users"> <span class="input-group-btn"> -->
                                                       <input type="text" name="search_text" id="search_text" class="form-control input-lg" placeholder="Search Employee"><span class="input-group-btn">
                                                        <button type="submit" class="btn btn-default">
                                                          <span class="glyphicon glyphicon-search"></span>
                                                        </button>
                                                      </span>

                                                    </div>

                                                  </form>
                                                   <div id="nameList">
                                                       </div>
                                                </div>
                                                <!--panel-body--> <!-- showing search form -->
                                                <div class="form-group">

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
<input type="submit" name="submit"  >
<div class="form-group" style="width: 340px; text-align: left; visibility: hidden;">
  {!! Form::text('email', $user->id, ['class' => 'form-control']) !!}
  <input type="text" name="loggedinuser" id="start" value="{{ $logged_in_user->id }}" class = "form-control" placeholder="{{ $logged_in_user->id }}">
</div>

<?php }
else
{
  ?>
   
<?php } ?>
</form> 
</div>
</center>
</div>
</div>
</div>

</div>
<div class="panel panel-default">
  <!-- <div class="panel-heading">
    <center>
      <font size="3">
        <h3>Appointment Status</h3>

        <div> Pending  </div>
        <div> Accepted </div>
        <div> Rejected </div>
        {{ $logged_in_user->email }}
      </font>
    </center>
  </div> -->
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
@endsection