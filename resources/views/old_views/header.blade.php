<!DOCTYPE html>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../resources/assets/css/main.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <p class="navbar-brand" href="#">{{ $society }} | {{ $action }}</p>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if($admin == 1)
                    <li><a href="{{URL::route('admin_panel')}}">Admin Panel</a></li>
                    <li><a href="{{URL::route('add_soc')}}">Add Society</a></li>
                    @endif
                    <li><a href="{{URL::route('add_soc_details')}}">View Member Details</a></li>
                    <li><a href="{{URL::route('add_event')}}">Add Event</a></li>
                    <li><a href="{{URL::route('view_event')}}">View Events</a></li>
                    @if($add_winners == 1)
                    <li><a href="{{URL::route('add_winners')}}">Add Winners</a></li>
                    @endif
                    <li><a href="{{URL::route('logout')}}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
