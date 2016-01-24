<!DOCTYPE html>
<html>
<head>
<title>Add Events</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="jumbotron" style="text-align:center">
		<h1>{{ $action }}</h1>
	</div>
</div>
<div class="container">
		<div style="text-align:center">
			<form class="form-horizontal" role="form" action="add_event" method="POST">
				<div class="form-group">
				<label for="event_name" class="col-md-4 control-label">Event Name</label>
					<div class="col-md-5">
						@if($action == 'Add Event')
						<input type="text" name="event_name" class="form-control" placeholder="Event Name">
						@else
						<p>{{ $event_name }}<p>
						@endif
					</div>
				</div><br>
				<div class="form-group">
					<label for="eventdesc" class="col-md-4 control-label">Event Description</label>
					<div class="col-md-5">
						<textarea rows="5" name="event_description" class="form-control"></textarea>
					</div>
				</div><br>
				<div class="form-group">
					<label for="time" class="col-md-4 control-label">Timing</label>
					<div class="col-md-5">
						<input type="datetime-local" name="timing" class="form-control" placeholder="Timing">
					</div>
				</div><br>
				<div class="form-group">
					<label for="winners" class="col-md-4 control-label">Number of Winners:</label>
					<div class="col-md-5">
						<input type="text" name="winners" class="form-control" placeholder="Number of Winners">
					</div>
				</div><br>
				<div> {{ $err }}</div>
				@if($errors->has())
				@foreach ($errors->all() as $error)
				<div>{{ $error }}</div>
				@endforeach
				@endif
				<div class="col-md-7"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">{{ @action }}</button>
                    </div>
                </div>
                <div class="col-md-5">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div>


			</form>
	</div>
</body>
</html>