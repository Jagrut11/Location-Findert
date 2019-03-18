@extends('frontend.layouts.app')

@section('content')
<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/locales.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css"></script>
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
 					<div class="panel-heading"><center><font size="3">{{ trans('Fix Appointment') }}</font></center></div>

                    <div class="panel-body">
                                            <form action="/search1" method="POST" role="search">
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

                <div class="panel-body">
                

<center>
    <div>{!! Form::open() !!}


<div class="form-group" style="width: 340px; text-align: left;">
    {!! Form::label('name', 'Employee Name') !!}
    {!! Form::text('name', 'Varun Shukla', ['class' => 'form-control']) !!}
    
  </div>
</div>

<div class="form-group" style="width: 340px; text-align: left;">
    {!! Form::label('email', 'E-mail Address') !!}
    {!! Form::text('email', 'abc@abc.com', ['class' => 'form-control']) !!}

</div>

<div class="form-group" style="width: 340px; text-align: left;">
{!! Form::label('date', 'Date: ' ) !!}
<input type="date" name="trip-start" id="start" value="2018-07-22" min="2019-01-01" max="2019-12-31">
</div>

<div class="form-group" style="width: 340px; text-align: left;">
{!! Form::label('time', 'Time: ' ) !!}
<input type="time" name="trip-start" id="start" value="13:00">
</div>

<div class="form-group" style="width: 340px;">
{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!} 
</div>

</div>
</center>
</div>
            </div>
        </div>

    </div>
                <div class="panel panel-default">
 					<div class="panel-heading">
                        <center>
                            <font size="3">
 							<h3>Appointment Status</h3>

                            <div> Pending  </div>
                            <div> Accepted </div>
                            <div> Rejected </div>
 					        </font>
                        </center>
                    </div>
 				</div>
@endsection