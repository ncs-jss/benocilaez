<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
 integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
 integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= 
 sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" 
 crossorigin="anonymous"></script>

</head>  
<body>
  <nav class="navbar navbar-default">
  	<div class="container-fluid">
      <div class="navbar-header">
       <p class="navbar-brand" href="#">{{ $society }} | {{ $action }}</p>
     </div>
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        @if($admin == 1)
        <li><a href="{{URL::route('add_soc')}}">Add Society</a></li>
        @endif
        <li><a href="{{URL::route('add_event')}}">Add Event</a></li>
        <li><a href="{{URL::route('view_event')}}">View Events</a></li>
        <li><a href="{{URL::route('add_winners')}}">Add Winners</a></li>
        <li><a href="{{URL::route('logout')}}">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
