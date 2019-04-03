<!DOCTYPE html>
<html>
  <head>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  -->
  <script src="/js/what3words.js"></script>
    <title>What3words Demo</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <!-- <style>
      html, body {
              text-align: center;
              width: 800px;
              height: 500px;
              margin: 0 auto;
              }
      #map {
              margin: auto;
              width: 100%;
              height:100%;
              padding: 10px;
              }
      
      #pac-input {
              text-align: center;
              } 
    </style> -->
  </head>
  
  <body>
    <div>
       @foreach($user as $users)
        <p>First Name:{{$users->first_name}}</p>
        <p>Last Name:{{$users->last_name}}</p>
        <p>Branch Name:{{$users->branch_name}}</p>
         <p>Floor No:{{$users->floor_no}}</p>
          <p>Seat No:{{$users->seat_no}}</p>

          
         @endforeach
    </div>
                 
                           
   <button>
     <a href="https://map.what3words.com/{{$words}}">Click Here</a>
   </button> 
    <!-- AIzaSyAtUZHevSsuCITMsYD2etL5b-FSdmcfBjA -->
    <!-- 79NK10MQ -->
  </body>
</html>
<!-- 79NK10MQ --> 