@extends('frontend.layouts.app')

@section('content')

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<!-- 
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">  -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
 <!--  <script src="/js/what3words.js"></script>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    -->
    <div class="panel panel-default">
          <div class="panel-heading"><center><font size="3">Details</font></center></div>

     <div class="panel-body">
      <table class="table table-striped">
        <thead>
                        <tr>
                        <th>First Name</th>
                        <th>Last Name</th>              
                        <th>Branch Name</th>
                        <th>Floor No</th>
                        <th>Seat No</th>
                      </tr>
        </thead>
            <tbody>
             @foreach($user as $users)
              <tr>
          <td>{{$users->first_name}}</td>
          <td>{{$users->last_name}}</td>
          <td>{{$users->branch_name}}</td>
          <td>{{$users->floor_no}}</td>
          <td>{{$users->seat_no}}</td>
        </tr>
         @endforeach
      </table>      
    </div> 
    <center>
    <button style="background-color: #e7e7e7;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: blink;
  display: inline-block;
  font-size: 16px;
  cursor: pointer";>
     <a href="https://map.what3words.com/{{$words}}" target="_blank">Locate</a>
     </button>
     </center><br>
      <!-- AIzaSyAtUZHevSsuCITMsYD2etL5b-FSdmcfBjA -->
    <!-- 79NK10MQ -->
@endsection
