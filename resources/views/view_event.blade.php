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
	<h1>{{ $society_name }}</h1>
		<div style="text-align:center">
		<table class=" table table-bordered">
			<tr>
				<th>#</th>
				<th>Event Id</th>
				<th>Event Name</th>
				<th>Event Description</th>
				<th>Approval status</th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td>1</td>
				<td>Event Id</td>
				<td>Event name</td>
				<td>This is a dummy data that has entered into this table to check if it is working.</td>
				<td>Approved or not</td>
				<td><a class="btn btn-info btn-xs" href="#" role="button">Edit</a></td>
				<td><a class="btn btn-danger btn-xs" href="#" role="button">Delete</a></td>
			</tr>
		</table>	
		</div>
	</div>
</body>
</html>