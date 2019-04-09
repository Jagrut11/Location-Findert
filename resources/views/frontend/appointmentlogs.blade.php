

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
 				<div class="panel-body">
                        
                        <form action="/showlog" method="POST" >
                            {{ csrf_field() }}
                            <div class="input-group">
                                <center>
                                <div class="input-group" style="visibility: hidden;">
                                <input type="text" class="form-control" name="q"
                                                        placeholder="Search users" value="{{$logged_in_user->id}}"> 
                                </div>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            Show All Booked Appointment <!-- <span class="glyphicon glyphicon-search"></span> -->
                                        </button>
                                    </span>
                                </center>
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
                                        <th>Sender ID</th>
                                        <th>Receiver ID</th>
                                        <th>appointment date</th>
                                        <th>appointment time</th>
                                        <th>appointment status</th>
                                        <th>created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($details as $appointment)
                                    <tr>
                                        <td>{{$appointment->sender_id}}</td>
                                        <td>{{$appointment->receiver_id}}</td>
                                        <td>{{$appointment->appointment_date}}</td>
                                        <td>{{$appointment->appointment_time}}</td>
                                        <td>{{$appointment->appointment_status}}</td>
                                        <td>{{$appointment->first_name}}</td>
                                        <td>{{$appointment->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    @endif
                </div> <!-- showing search result -->
            </div>
        </div>
    </div>
