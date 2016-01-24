<!DOCTYPE html>
<html>
<head>
	<title>Veiw Events</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron" style="text-align:center">
			<h1>Veiw Events</h1>
		</div>
	</div>
	<div class="container">
		@foreach ($societies as $data)
		<h1>{{ $data['society_name'] }}</h1>
		<div style="text-align:center">
			<table class=" table table-bordered">
				<tr>
					<th class="col-md-1">#</th>
					<th class="col-md-1">Event Id</th>
					<th class="col-md-2">Event Name</th>
					<th class="col-md-5">Event Description</th>
					<th class="col-md-1">Approval Status</th>
					<th class="col-md-1"></th>
					<th class="col-md-1"></th>
				</tr>
				<?php $i=0; ?>
				@foreach ( $data['society_events'] as $event)
				<?php $i++; ?>
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $event->event_id }}</td>
					<td>{{ $event->event_name }}</td>
					<td>{{ $event->event_description }}</td>
					<td>{{ ($event->approved == 0 ) ? 'Not Approved' : 'Approved' }}</td>
					<td><a class="btn btn-info btn-xs" href="#" role="button">Edit</a></td>
					<td><a class="btn btn-danger btn-xs" href="#" role="button">Delete</a></td>
				</tr>
				@endforeach
			</table>	
		</div>
		@endforeach
	</div>
</body>
</html><!DOCTYPE html>
<html>
<head>
	<title>Veiw Events</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron" style="text-align:center">
			<h1>Veiw Events</h1>
		</div>
	</div>
	<div class="container">
		@foreach ($societies as $data)
		<h1>{{ $data['society_name'] }}</h1>
		<div style="text-align:center">
			<table class=" table table-bordered">
				<tr>
					<th>#</th>
					<th>Event Id</th>
					<th>Event Name</th>
					<th>Event Description</th>
					<th>Approval Status</th>
					<th>Edit Event</th>
					<th>Delete Event</th>
				</tr>
				<?php $i=0; ?>
				@foreach ( $data['society_events'] as $event)
				<?php $i++; ?>
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $event->event_id }}</td>
					<td>{{ $event->event_name }}</td>
					<td>{{ $event->event_description }}</td>
					<td>{{ ($event->approved == 0 ) ? 'Not Approved' : 'Approved' }}</td>
					<td><a class="btn btn-info btn-xs" href="#" role="button">Edit</a></td>
					<td><a class="btn btn-danger btn-xs" href="#" role="button">Delete</a></td>
				</tr>
				@endforeach
			</table>	
		</div>
		@endforeach
	</div>
</body>
</html>