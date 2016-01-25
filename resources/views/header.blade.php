<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> 
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
        <li><a href="add_society">Add Society</a></li>
        @endif
        <li><a href="add_event">Add event</a></li>
        <li><a href="view_event">View Events</a></li>
        <li><a href="add_winners">Add Winners</a></li>
        <li><a href="logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
